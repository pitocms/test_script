# Commission task skeleton

Following steps:
1) git clone https://github.com/pitocms/test_script.git
2) Go to project directory.
3) Give command `docker-compose up --build`
4) Access in docker container `docker exec -it test-script-app  bash`
5) To run script give command `php index.php csv/input.csv` (I have taken csv input file directory from cmg arg)

Note : csv file has keeped into `csv/input.csv` directory , If you want to apply your csv file please replace this file by your own csv file. 

6) Unit test script has written in test folder, to run 'composer phpunit'
