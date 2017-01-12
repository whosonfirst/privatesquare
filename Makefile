all: prod templates php-ini

mapzen: tangram mapzenjs refill crosshairs

tangram:
	curl -s -o www/javascript/tangram.js https://mapzen.com/tangram/tangram.debug.js
	curl -s -o www/javascript/tangram.min.js https://mapzen.com/tangram/tangram.min.js

mapzenjs:
	curl -s -o www/css/mapzen.js.css https://mapzen.com/js/mapzen.css
	curl -s -o www/javascript/mapzen.js https://mapzen.com/js/mapzen.min.js

refill:
	if test ! -d www/tangram/images; then mkdir -p www/tangram/images; fi
	curl -s -o www/tangram/refill.yaml https://raw.githubusercontent.com/tangrams/refill-style/gh-pages/refill-style.yaml
	curl -s -o www/tangram/images/poi_icons_18@2x.png https://raw.githubusercontent.com/tangrams/refill-style/gh-pages/images/poi_icons_18%402x.png
	curl -s -o www/tangram/images/building-grid.gif https://raw.githubusercontent.com/tangrams/refill-style/gh-pages/images/building-grid.gif

leaflet:
	curl -s -o www/javascript/leaflet.label.min.js https://raw.githubusercontent.com/Leaflet/Leaflet.label/master/dist/leaflet.label.js
	curl -s -o www/javascript/mapzen.whosonfirst.leaflet.js https://raw.githubusercontent.com/whosonfirst/js-mapzen-whosonfirst/master/src/mapzen.whosonfirst.leaflet.js
	curl -s -o www/javascript/mapzen.whosonfirst.leaflet.styles.js https://raw.githubusercontent.com/whosonfirst/js-mapzen-whosonfirst/master/src/mapzen.whosonfirst.leaflet.styles.js
	curl -s -o www/javascript/mapzen.whosonfirst.leaflet.handlers.js https://raw.githubusercontent.com/whosonfirst/js-mapzen-whosonfirst/master/src/mapzen.whosonfirst.leaflet.handlers.js

crosshairs:
	curl -s -o www/javascript/slippymaps.crosshairs.js https://raw.githubusercontent.com/whosonfirst/js-slippymap-crosshairs/master/src/slippymap.crosshairs.js

js:
	java -Xmx64m -jar lib/google-compiler/compiler-20100616.jar --js www/javascript/privatesquare.js --js www/javascript/privatesquare.venues.js --js www/javascript/privatesquare.foursquare.js --js www/javascript/privatesquare.nypl.js --js www/javascript/privatesquare.stateofmind.js --js www/javascript/privatesquare.api.js > www/javascript/privatesquare.core.min.js

	java -Xmx64m -jar lib/google-compiler/compiler-20100616.jar --js www/javascript/privatesquare.pending.js --js www/javascript/privatesquare.deferred.js > www/javascript/privatesquare.deferred.min.js

	java -Xmx64m -jar lib/google-compiler/compiler-20100616.jar --js www/javascript/privatesquare.trips.js --js www/javascript/privatesquare.trips.calendars.js > www/javascript/privatesquare.trips.min.js

	cat www/javascript/jquery-2.1.0.min.js www/javascript/bootstrap.min.js www/javascript/htmlspecialchars.min.js > www/javascript/privatesquare.dependencies.core.min.js

	cat www/javascript/jquery-2.1.0.min.js www/javascript/htmapl-standalone.min.js www/javascript/store.min.js > www/javascript/privatesquare.dependencies.app.js

	cat www/javascript/select2.js www/javascript/brick-calendar.min.js > www/javascript/privatesquare.dependencies.trips.min.js

css:

	cat www/css/bootstrap.min.css www/css/bootstrap.privatesquare.css www/css/privatesquare.htmapl.css > www/css/privatesquare.core.min.css

	cat www/css/select2.css www/css/bootstrap.select2.css www/css/brick-calendar.min.css > www/css/privatesquare.trips.min.css

prod: js css

templates:
	php -q ./bin/compile-templates.php

secret:
	php -q ./bin/generate_secret.php

prune:
	git gc --aggressive --prune

setup:
	if test -z "$$DBNAME"; then echo "YOU FORGET TO SPECIFY DBNAME"; exit 1; fi
	if test -z "$$DBUSER"; then echo "YOU FORGET TO SPECIFY DBUSER"; exit 1; fi
	if test ! -f www/include/secrets.php; then cp www/include/secrets.php.example www/include/secrets.php; fi
	ubuntu/setup-ubuntu.sh
	ubuntu/setup-flamework.sh
	ubuntu/setup-certified.sh
	sudo ubuntu/setup-certified-ca.sh
	sudo ubuntu/setup-certified-certs.sh
	ubuntu/setup-apache-conf.sh
	bin/configure_secrets.sh .
	ubuntu/setup-db.sh $(DBNAME) $(DBUSER)
