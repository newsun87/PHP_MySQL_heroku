git config --global user.email 'newsun87@mail.sju.edu.tw'
git config --global user.name 'newsun87'
git init
heroku git:remote -a php-mysql-test-20210111
git add .
git commit -m "init."
git push heroku master