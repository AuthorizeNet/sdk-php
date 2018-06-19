#!/bin/bash
#sed -i "/ARBGetSubscriptionRequest/,/^}/s%^}%\t//JsonSerialize code appended\n
#}\n
#test\n
#entry%" "ARBGetSubscriptionRequest.php"

#sed -E "/ARBGetSubscriptionRequest/,/^}/s%^}%s\t//777 code appended[\n] s /\
#/}%" "ARBGetSubscriptionRequest.php"


#perl -p -w -e "/ARBGetSubscriptionRequest/,/^}/s%^}%s\t//777 code appended[\n] s /\
#/}%" "ARBGetSubscriptionRequest.php"
#
#file='ARBGetSubscriptionRequest.php'
#echo $file;
#perl -p -w -e  "s|(.+)}|$1KKM|xms;" $file
#
#perl - $ <<'__HERE__'
#my $text = `cat ARBGetSubscriptionRequest.php`;
#$text =~ s|(.+)}|$1$sub|xms;
#my $sub = `cat appendSetCode.txt`;
#print 'Result : '.$sub."\n";
#__HERE__
#$line =~ s/\}(\s*)$/:$1/;
#perl test.pl requestList.txt
#
##!/bin/bash

echo "Starting appending seralization code `date`"

#ls *.php  | grep -i -e "request\.php"> requestList.txt
#ls *.php  | grep -i -e "response\.php" > responseList.txt
# ls *.php  | grep -i -e "type\.php" | grep -i -v "ANetApi" > typeList.txt
#ls *.php  | grep -i -e "type\.php" > typeList.txt
#find . -print | grep -i -e "type\.php" > typeList.txt
#find  -print | grep -i -e "type\.php" | cut -c 3- > typeList.txt

# List filenames with request, response and type and remove the file path upto v1 i.e. 38 characters
find ../lib/net/authorize/api/contract/v1 -print | grep -i -e "request\.php"   | cut -c 38-  > requestList.txt
find ../lib/net/authorize/api/contract/v1 -print | grep -i -e "response\.php"  | cut -c 38-  > responseList.txt
find ../lib/net/authorize/api/contract/v1 -print | grep -i -e "type\.php"      | cut -c 38-  > typeList.txt
find ../lib/net/authorize/api/contract/v1 -print | grep -i -e "type\.php"    > typeList2.txt

#mkdir -p ../lib/net/authorize/api/contract/v1/backup

#appendJsonSeralizeCode=`cat appendJsonSeralizeCode.txt`
#appendSetCode=`cat appendSetCode.txt`

echo "Taking backup of Types"
perl backup.pl typeList.txt
echo "Appending JsonSerialize code to Types"
perl appendJsonSeralizeCode.pl typeList.txt
echo "Appending Set code to Types"
perl appendSetCode.pl typeList.txt


echo "Taking backup of Requests"
perl backup.pl requestList.txt
echo "Appending JsonSerialize code to Requests"
perl appendJsonSeralizeCode.pl requestList.txt
#echo "Appending Set code to Requests"
#perl appendSetCode.pl requestList.txt

echo "Taking backup of Responses"
perl backup.pl responseList.txt
#echo "Appending JsonSerialize code to Responses"
#perl appendJsonSeralizeCode.pl responseList.txt
echo "Appending Set code to Responses"
perl appendSetCode.pl responseList.txt

echo "Done Phase 1"

list="typeList2.txt"
while read -r filename
do
    filename=$(echo "$filename" | sed -e "s/^\.\///g")
    echo "Appending implements JsonSerializable to - $filename"
    sed -i.bak '/^class/ s/$/ implements \\JsonSerializable/' "$filename"

done < "$list"


