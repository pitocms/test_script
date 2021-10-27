# Commission task skeleton

Following steps:
1) Git clone 
2) Go in project directory 
3) Give command `docker-compose up --build`
4) Access in docker container `docker exec -it test-script-app  bash`
5) To run script give command `php index.php csv/input.csv`

Note : csv file has keeped into `csv/input.csv` directory , If you want to apply your csv file please replace this file by your csv file. 

6) Unit test script has written in test folder, to run 'composer phpunit'
