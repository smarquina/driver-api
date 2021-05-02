install-app:
	bash installation/install
	bash ./vendor/bin/sail up -d

run:
	docker-compose up -d

down:
	docker-compose down -v --remove-orphans
