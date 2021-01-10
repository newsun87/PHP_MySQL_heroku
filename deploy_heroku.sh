git config --global user.email 'tinaliou4@gmail.com'
git config --global user.name 'tinaliou4'
git init
heroku git:remote -a php-mysql-test-20210111
git add .
git commit -m "init."
git push heroku master
