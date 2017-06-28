#!/bin/bash

echo "Starting appending seralization code `date`"

ls *.php  | grep -i -e "request\.php"> requestList.txt
ls *.php  | grep -i -e "response\.php" > responseList.txt
# ls *.php  | grep -i -e "type\.php" | grep -i -v "ANetApi" > typeList.txt
# ls *.php  | grep -i -e "type\.php" > typeList.txt
find . -print | grep -i -e "type\.php" > typeList.txt

appendJsonSeralizeCode=`cat appendJsonSeralizeCode.txt`
appendSetCode=`cat appendSetCode.txt`


list="typeList.txt"
while read -r filename
do
	filename=$(echo "$filename" | sed -e "s/^\.\///g")
	classname=$(echo "$filename" | sed 's:.*/::')
	classname=$(echo "$classname" | sed 's/\.[^.]*$//')

	echo "Appending code to - $classname"

	sed -i '/^class/ s/$/ implements \\JsonSerializable/' "$filename"
	sed -i "/$classname/,/^}/s%^}%\t//JsonSerialize code appended\n}%" "$filename"
	sed -i "/$classname/,/^}/s%^}%\t$appendJsonSeralizeCode\n}%" "$filename"

	sed -i "/$classname/,/^}/s%^}%\t//Set code appended\n}%" "$filename"
	sed -i "/$classname/,/^}/s%^}%\t$appendSetCode\n}%" "$filename"

done < "$list"

list="requestList.txt"
while read -r filename
do
	classname=$(echo "$filename" | sed 's/\.[^.]*$//')

	echo "Appending code to - $classname"
	# sed -i '/^class/ s/$/ implements \\JsonSerializable/' "$filename"
	sed -i "/$classname/,/^}/s%^}%\t//JsonSerialize code appended\n}%" "$filename"
	sed -i "/$classname/,/^}/s%^}%\t$appendJsonSeralizeCode\n}%" "$filename"

	# sed -i "/$classname/,/^}/s%^}%\t//Set code appended\n}%" "$filename"
	# sed -i "/$classname/,/^}/s%^}%\t$appendSetCode\n}%" "$filename"
	
done < "$list"

list="responseList.txt"
while read -r filename
do
	classname=$(echo "$filename" | sed 's/\.[^.]*$//')

	echo "Appending code to - $classname"

	# sed -i '/^class/ s/$/ implements \\JsonSerializable/' "$filename"
	# sed -i "/$classname/,/^}/s%^}%\t//JsonSerialize code appended\n}%" "$filename"
	# sed -i "/$classname/,/^}/s%^}%\t$appendJsonSeralizeCode\n}%" "$filename"

	sed -i "/$classname/,/^}/s%^}%\t//Set code appended\n}%" "$filename"
	sed -i "/$classname/,/^}/s%^}%\t$appendSetCode\n}%" "$filename"
	
done < "$list"
