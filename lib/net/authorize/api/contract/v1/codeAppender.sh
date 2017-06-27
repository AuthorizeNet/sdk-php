#!/bin/bash

echo "Starting appending seralization code `date`"

ls *.php  | grep -i -e "request\.php"> requestList.txt
ls *.php  | grep -i -e "response\.php" > responseList.txt
# ls *.php  | grep -i -e "type\.php" | grep -i -v "ANetApi" > typeList.txt
ls -R  | grep -i -e "type\.php" > typeList.txt
appendJsonSeralizeCode=`cat appendJsonSeralizeCode.txt`
appendSetCode=`cat appendSetCode.txt`

# var="some string.rtf"
# echo "$var"
# # sed -i 's/\.[^.]*$//' 
# v2=$(echo "$var" | sed 's/\.[^.]*$//')
# echo "$v2"
# # v2=${v::-4}
# # echo "$v --> $v2"

list="typeList.txt"
while read -r filename
do
	classname=$(echo "$filename" | sed 's/\.[^.]*$//')

    sed -i '/^class/ s/$/ implements \\JsonSerializable/' "$filename"
    sed -i "/$classname/,/^}/s%^}%\t//JsonSerialize code appended\n}%" "$filename"
	sed -i "/$classname/,/^}/s%^}%\t$appendJsonSeralizeCode\n}%" "$filename"

	sed -i "/$classname/,/^}/s%^}%\t//Set code appended\n}%" "$filename"
	sed -i "/$classname/,/^}/s%^}%\t$appendSetCode\n}%" "$filename"

	echo "$classname Done"

done < "$list"

list="requestList.txt"
while read -r filename
do
	classname=$(echo "$filename" | sed 's/\.[^.]*$//')

    # sed -i '/^class/ s/$/ implements \\JsonSerializable/' "$filename"
    sed -i "/$classname/,/^}/s%^}%\t//JsonSerialize code appended\n}%" "$filename"
	sed -i "/$classname/,/^}/s%^}%\t$appendJsonSeralizeCode\n}%" "$filename"

	# sed -i "/$classname/,/^}/s%^}%\t//Set code appended\n}%" "$filename"
	# sed -i "/$classname/,/^}/s%^}%\t$appendSetCode\n}%" "$filename"

	echo "$classname Done"
	
done < "$list"

list="responseList.txt"
while read -r filename
do
	classname=$(echo "$filename" | sed 's/\.[^.]*$//')

 #    sed -i '/^class/ s/$/ implements \\JsonSerializable/' "$filename"
 #    sed -i "/$classname/,/^}/s%^}%\t//JsonSerialize code appended\n}%" "$filename"
	# sed -i "/$classname/,/^}/s%^}%\t$appendJsonSeralizeCode\n}%" "$filename"

	sed -i "/$classname/,/^}/s%^}%\t//Set code appended\n}%" "$filename"
	sed -i "/$classname/,/^}/s%^}%\t$appendSetCode\n}%" "$filename"

	echo "$classname Done"
	
done < "$list"
