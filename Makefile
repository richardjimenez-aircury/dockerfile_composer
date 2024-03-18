bash: 
	sudo docker compose exec -u www-data php /bin/bash


reboot:
	sudo docker compose down
	sudo docker compose build
	sudo docker compose up -d