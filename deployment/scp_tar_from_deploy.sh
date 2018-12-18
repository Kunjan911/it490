#!/bin/bash

# SCP the tar from the deploy server to its destination

#sourcefile=$1
#scp /home/roydem/database/scp/$sourcefile roydem@192.168.1.10:/home/roydem/scp
#echo $sourecfile

cd /var/temp

pv $1 | ssh parth@192.168.1.4 'cat | tar xz --strip-components=1 -C /home/parth/Desktop/Parth/'
