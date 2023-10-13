@echo off
setlocal

set "destinationFolder=Mycoach"

if exist "%destinationFolder%" (
    echo Le dossier %destinationFolder% existe déjà. Abandon.
    exit /b 1
)

mkdir "%destinationFolder%"

cd "%destinationFolder%"

git clone https://github.com/Gxb001/Mycoach.git

echo Clonage terminé.

endlocal
