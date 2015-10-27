#!/bin/bash

echo Started at `date`
echo This script will update the generated code
echo

currdir=`pwd`
cmdlist="generateObjectsFromXsd.sh generateControllersFromTemplate.sh"
for cmd in $cmdlist ; do 
    echo Executing Script "$cmd"
    if [ ! -f $currdir/scripts/$cmd ];then
        echo "Script $currdir/scripts/$cmd not found"
        exit 1
    fi
    $currdir/scripts/$cmd
    # echo ***FIXME*** $currdir/scripts/$cmd
    ERRORCODE=$?
    if [ $ERRORCODE -ne 0 ];then
        echo "########################################################################"
        echo "Encountered error during execution of $cmd"
        echo "See logs or output above."
        echo "Exiting, Update ***NOT*** complete."
        exit $ERRORCODE
    fi
done
echo Exiting, Update completed successfully.
echo Compile, run tests and commit to git-hub.
echo Completed at `date`

