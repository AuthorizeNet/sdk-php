#!/bin/bash

# sudo apt-get install php5-curl
# composer install

#create directories that do not exist
apidir=lib/net/authorize/api/contract/v1
#net.authorize.api.contract.v1.
if [ -d "$apidir" ]; then
	rm -r "$apidir"
fi
mkdir -p "$apidir"
echo Make sure the ns-dest uses destination as: $apidir
logfile=./xsdgen.log
echo `date` > $logfile
echo Generating PHP Classes >> $logfile
vendor/goetas/xsd2php/bin/xsd2php  convert:php \
	--ns-dest='net.authorize.api.contract.v1.;lib/net/authorize/api/contract/v1' \
	--ns-map='http://www.w3.org/2001/XMLSchema;W3/XMLSchema/2001/' \
	--ns-map='AnetApi/xml/v1/schema/AnetApiSchema.xsd;net.authorize.api.contract.v1' \
	./AnetApiSchema.xsd  >> $logfile 2>> $logfile
echo Generation of PHP Classes complete >> $logfile

jmsdir=lib/net/authorize/api/yml/v1
if [ -d "$jmsdir" ]; then
	rm -r "$jmsdir"
fi
mkdir -p "$jmsdir"
echo Generating Serializers for Classes >> $logfile
vendor/goetas/xsd2php/bin/xsd2php  convert:jms-yaml \
	--ns-dest='net.authorize.api.contract.v1.;lib/net/authorize/api/yml/v1' \
	--ns-map='http://www.w3.org/2001/XMLSchema;W3/XMLSchema/2001/' \
	--ns-map='AnetApi/xml/v1/schema/AnetApiSchema.xsd;net.authorize.api.contract.v1' \
	./AnetApiSchema.xsd  >> $logfile
echo Generator output is in file: $logfile

#GOOD
# vendor/goetas/xsd2php/bin/xsd2php.php  convert:php \
	# --ns-dest='net.authorize.api.contract.v1.;lib/net/authorize/api/contract/v1' \
	# --ns-map='http://www.w3.org/2001/XMLSchema;W3/XMLSchema/2001/' \
	# --ns-map='AnetApi/xml/v1/schema/AnetApiSchema.xsd;net.authorize.api.contract.v1' \
	# /home/ramittal/AnetApiSchema.xsd  >> $logfile
#Old good
# vendor/goetas/xsd2php/bin/xsd2php.php convert:php \
	# --ns-dest='net.authorize.api.contract.v1.;lib/net/authorize/api/contract/v1' \
	# --ns-map='http://www.w3.org/2001/XMLSchema;W3/XMLSchema/2001/' \
	# --ns-map='AnetApi/xml/v1/schema/AnetApiSchema.xsd;net.authorize.api.contract.v1' \
	# /home/ramittal/AnetApiSchema.xsd 
# 
# jmsdir=lib/net/authorize/api/jms/v1
# mkdir -p $jmsdir
# rm -r $jmsdir\*
# Do not want JMS serializer
# echo Generating Serializers for Classes >> $logfile
# vendor/goetas/xsd2php/bin/xsd2php.php  convert:jms-yaml \
	# --ns-dest='net.authorize.api.contract.v1.;lib/net/authorize/api/jms/v1' \
	# --ns-map='http://www.w3.org/2001/XMLSchema;W3/XMLSchema/2001/' \
	# --ns-map='AnetApi/xml/v1/schema/AnetApiSchema.xsd;net.authorize.api.contract.v1' \
	# /home/ramittal/AnetApiSchema.xsd  >> $logfile
#DOOG


#--alias-map='Vendor/Project/CustomDateClass; http://www.opentravel.org/OTA/2003/05#CustomOTADateTimeFormat'

# symfony/console suggests installing symfony/event-dispatcher ()
# symfony/console suggests installing psr/log (For using the console logger)
# phpunit/php-code-coverage suggests installing ext-xdebug (>=2.2.1)
# phpunit/phpunit suggests installing phpunit/php-invoker (~1.1)
# symfony/dependency-injection suggests installing symfony/proxy-manager-bridge (Generate service proxies to lazy load them)

# ----------------
# zendframework/zend-stdlib suggests installing zendframework/zend-serializer (Zend\Serializer component)
# zendframework/zend-stdlib suggests installing zendframework/zend-servicemanager (To support hydrator plugin manager usage)
# zendframework/zend-code suggests installing doctrine/common (Doctrine\Common >=2.1 for annotation features)
# symfony/console suggests installing symfony/event-dispatcher ()
# symfony/console suggests installing psr/log (For using the console logger)
