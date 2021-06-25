This is a generic eCommerce website built on Laravel.

Partially influenced by https://github.com/easylearningbd/laravelecommerce

This project is essentially a backend boilerplate for eCommerce projects. There is as little styling as possible - most of which is to be overridden/deleted.


# DB Design

Drew inspiration from the following designs:

	https://resources.fabric.inc/hs-fs/hubfs/ecommerce-platform-data-1.png

	https://creately.com/diagram/example/iosv0d302/E-commerce%20database%20schema
		product_details table


# USER REGISTRATION

	login
	logout
	sign up



# SHOPPING CART

This app includes a custom cart rather than integrating with a 3rd party solution such as Snipcart which would eat into our shop's profits.

# BUGS / SECURITY VULNERABILITIES / REFACTORING

1. Can hacker add/remove items to/from someone else's cart?
2. User can enter negative quantities
3. In cart_items table, add an additional field 'status' with possible values: in cart, ordered, removed.
	When item is removed or ordered, 'active' becomes "false"
4. When user logs in, store session data into DB.


