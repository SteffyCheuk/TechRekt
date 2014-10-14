#!/usr/bin/python
import cgi
from semantics3 import Products

print "Content-Type: text/html; charset=utf-8"     # HTML is following
print                               # blank line, end of headers
print

form = cgi.FieldStorage()

products = Products(
  api_key = "SEM386CE2A2ADD7FE4231D18D2B29A67A04B",
  api_secret = "ZDE1NDk4ODg2YzllOWI4NTg4Nzg3ZGY1NmY2ZDQ3NTc"
)

# TEST RUN
# cat_id of the product
# prod = 12855 # test using laptop
# price1 = 500.0 # test of lower bound price
# price2 = 1000.0 # test of upper bound price
# brand = 'Lenovo' # brand of product
# features = [('Operating System', 'Windows'), ('Screen Size', '13'), ('Touchscreen', 'Yes')]

def inside(s):
	first = s.find("'")
	if first == -1:
		return s
	return s[first+1:s.find("'", first+1)]

def get_prod_type(x):
	if x == "23042":
		return 'Tablets'
	elif x == "12855":
		return 'Laptops'
	elif x == "16329":
		return 'Phones'
	else:
		return 'eBook Readers'


cat_id = form['cat_id'].value

price_range = form['price'].value

price_min = float(price_range[:price_range.find(";")])
price_max = float(price_range[price_range.find(";")+1:])

size = form['size'].value

os = form['OS'].value

brands = form.getlist('brand')

mem = form['Memory'].value

# mem_min = float(mem_range[:mem_range.find(';')])
# mem_max = float(mem_range[mem_range.find(';')+1:])

screen_res = form['Screen Resolution'].value

hard_drive = form['Memory'].value

touchscreen = form['Touchscreen'].value

bat_life = form['Battery Life'].value

# add features to feature search list

features = []

if (os is not 'No Preference'):
	features.append(('Operating System', os))

if (touchscreen is not 'No'):
	features.append(('Touchscreen', touchscreen))

features.append(('Screen Size', size))
features.append(('Hard Drive Capacity', hard_drive))
features.append(('Battery Run Time', bat_life))

# general product information
products.products_field( "cat_id", cat_id )
products.products_field( "price", "gt", price_min )
products.products_field( "price", "lt", price_max )

# list of dictionaries that each contain results
final = []

if len(brands) == 0:
	# product features
	for feature in features:
		products.products_field( "features", "{%s, %s}" % feature )

	# sort products by lowest price first
	products.products_field( "sort", {"price": "asc"} )

	results = products.get_products()
	final.append(results)

for brand in brands:
	products.products_field( "brand", brand )

	# product features
	for feature in features:
		products.products_field( "features", "{%s, %s}" % feature )

	# sort products by lowest price first
	products.products_field( "sort", {"price": "asc"} )

	results = products.get_products()
	final.append(results)

if len(final[0][u'results']) == 0:
	print('''
			<!DOCTYPE html>
			<html lang='en'>
				<head>
					<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
					<meta content="utf-8" http-equiv="encoding">
					<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,100,300,400italic,500,700,900' rel='stylesheet' type='text/css'>
					<link rel='stylesheet' type="text/css" href=".././css/bootstrap.css">
				</head>
				<body id='background_dots'>

				<div class="navbar navbar-inverse">
				  <div class="navbar-header">
				    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
				      <span class="icon-bar"></span>
				      <span class="icon-bar"></span>
				      <span class="icon-bar"></span>
				    </button>
				    <a class="navbar-brand" style="color:#414141; font-family:'Roboto Slab'; font-size: 26" href=".././index.html"><img style="max-height: 30px" src=".././assets/unnamedtiny.png"> TechRekt</a>
				  </div>

				  <div class="navbar-collapse collapse navbar-inverse-collapse">

				    <ul class="nav navbar-nav navbar-right">
				      <li><a href=".././about.html">ABOUT</a></li>
				      <li><a href=".././faq.html">FAQ</a></li>
				      <li><a href=".././contact.html">CONTACT</a></li>

				    </ul>
				  </div>
				</div>

				<div id='product_header'>
					<div class="row">
						<div id='fitted_thinner_small' class="col-md-9 extend_dank">
							<div id='roboto_font_orange'>Sorry, no matches were found.</div>
						</div>
					</div>
				</div>

				<div id='product_header'>
					<div class="row">
						<div id='fitted_thinner_small2' class="col-md-9 extend_dank">
							<div id='roboto_font_orange'>Please try another search.</div>
						</div>
					</div>
				</div>

				</body>
			</html>
		''')

else:
	best = final[0][u'results'][0]
	weight = float(inside(best[u'weight'])) * .0000022
	chars = [('Weight: ' + str(weight)[:4] + ' lbs', )]
	num = 0

	while num < 2:
		try:
			typ = best[u'features'].keys()[num]
			chars.append((inside(typ) + ': ' + inside(best[u'features'][typ].encode('utf-8')), ))
		except:
			pass
		num += 1
	try:
		seller = ((inside(best[u'sitedetails'][num][u'url'].encode('utf-8')), inside(best[u'sitedetails'][num][u'latestoffers'][0][u'price'].encode('utf-8'))))
	except:
		seller = ('No sellers found', 'No price available')
	prod_type = get_prod_type(cat_id)
	first_name = inside(best[u'name'].encode('utf-8'))
	tab = first_name.find("-")
	if tab != -1:
		first_name = first_name[:tab]
	best_name = (first_name, )
	best_brand = inside(best[u'brand'].encode('utf-8'))
	tup = (prod_type, best_brand)
	best_price = (inside(best[u'price'].encode('utf-8')), )
	try:
		img_url = (inside(best[u'images'][0].encode('utf-8')), )
	except:
		img_url = (".././img/imageNotFound.jpg", )

	tup += best_price
	tup += img_url
	tup += best_name
	for char in chars:
		tup += char
	tup += seller
	print('''

		<!DOCTYPE html>
		<html lang='en'>
			<head>
				<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
				<meta content="utf-8" http-equiv="encoding">
				<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,100,300,400italic,500,700,900' rel='stylesheet' type='text/css'>
				<link rel="stylesheet" type="text/css" href=".././css/bootstrap.css">
			</head>
			<body id='background_dots'>

			<div class="navbar navbar-inverse">
			  <div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			    </button>
			    <a class="navbar-brand" style="color:#414141; font-family:'Roboto Slab'; font-size: 26" href=".././index.html"><img style="max-height: 30px" src=".././assets/unnamedtiny.png"> TechRekt</a>
			  </div>

			  <div class="navbar-collapse collapse navbar-inverse-collapse">

			    <ul class="nav navbar-nav navbar-right">
			      <li><a href=".././about.html">ABOUT</a></li>
			      <li><a href=".././faq.html">FAQ</a></li>
			      <li><a href=".././contact.html">CONTACT</a></li>

			    </ul>
			  </div>
			</div>..

				<div id='product_header'>
					<div class="row">
						<div id='fitted_thinner' class="col-md-9 extend_dank">
							<div id='roboto_font_orange'>%s</div>
							<div id='roboto_font_orange'> > </div>
							<div id='roboto_font_orange'> %s </div>
						</div>
					</div>
				</div>

				<div id='product_panel' class="panel panel-default">
				  <div id='product_main'> 
				  	<p id='main_price'>$%s</p>
				    <div class="container">
				    	<div id='product_panel_left'><img style="max-height:340px; max-width:340px;" src="%s"></div>
				    	<div id='product_panel_left2'><div id='product_container'> %s <br/></div>
				    	<ul id='ul_font'>
				    		<li>%s</li>
				    		<li>%s</li>
				    		<li>%s</li>
				    	</ul></div>
				    	<div id='product_panel_right' class="panel">
				    		<div id='sellers_panel' class="panel-body">
				    			<div id='sellers_header'>WHERE TO BUY /</div>
				    			<hr>
				    			<div id='sellers_text'>%s </div><div id='prices_text'> %s<br/></div>
				    		</div>
				    	</div>
				  	</div>
				  <div id='product_footer2' class="panel-footer">
				  	<div id='footer_content'> Tentative Product Queue
				  	</div>
				  </div>
					</div>
				</div>
			

			</body>
		</html>

	''' % tup)