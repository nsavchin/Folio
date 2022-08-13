<img src="https://i.ibb.co/MRnv3dt/image.png">

# About

This is a portfolio web app where you can easily showcase your projects and more.

# Install

Clone git repository
<pre>
git clone https://github.com/nsavchin/Folio.git
</pre>

Install composer & npm packages

<pre>
composer install
npm install
npm run production
</pre>

Database
Before executing the commands, enter the correct data from the database in the <code>.env</code> file.

<pre>
# Migration database
php artisan migrate
# Seeder user <b>admin</b> and password <b>EU$rHuLBJ6D6IP@p</b> (for change login and password need edit <b>database/seeders/UserSeeder.php</b>)
php artisan db:seed --class=UserSeeder
</pre>
