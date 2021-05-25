# blog-demo-api
php laravel vue


Step by step to deploy to vps google cloud:
Note: Before pushing the  project to github, ensure that including .env in laravel project and config port for webserver (nginx docker)

1. Create 1 vm instance on Google cloud platform
2. Add your computer's ssh key (id_rsa.pub) to Metadata of vm (to remote VPS from your computer)
3. Connect to VPS by: `ssh [username]@[VPS_external_ip_address]`
4. Install git, docker, docker-compose for VPS
5. Pull project from your git repo.
6. cd to your project, run `docker-compose up -d` and `docker-compose run composer install`
7. Move into php shell, run `docker-compose run php sh`
8. Run `php artisan config:cache` and `php artisan migrate`

Tadaaa, had already finished and open in your browser [ip_address]:[port]

