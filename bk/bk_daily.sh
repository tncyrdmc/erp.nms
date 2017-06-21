#!/bin/bash
#echo "creando dump";
#dir=$DIRSTACK"/erp.multinivel/bk/";
dir=$HOME"/html/test/bk/";
hostname=$1;
username=$2;
password=$3;
database=$4;
crear=$(date +"%Y%m%d" )"_"$database; # echo ("en local --date='-1 day'");
eliminar=$(date +"%Y%m%d" --date='-15 day')"_"$database; 
#echo $archivo;
mysqldump -h $hostname -u $username -p$password $database > $dir$crear"_dump.sql";
if [[ $(find $dir*.sql | wc -l) -ge 15 ]]; then
	rm $dir$eliminar"_dump.sql";
	#rm $dir$crear"_dump.sql";
fi
rm $dir"db_access.php";
