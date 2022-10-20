du:
	docker-compose up -d

dd:
	docker-compose down

db:
	docker-compose up --build -d

front:
	docker exec -it meritdata_frontend_1 bash

back:
	docker exec -it meritdata_backend_1 bash

baza:
	docker exec -it meritdata_postgres_1 bash

perm:
	sudo chown ${USER} console/migrations -R

dump:
	docker exec -it meritdata_postgres_1 bash -c "pg_dump --host=localhost --port=5432 --username=postgres  --dbname=meritdatadb > ./app/dump.sql"

restore:
	docker exec -i meritdata_postgres_1  /bin/bash -c "PGPASSWORD=meritdata psql --username postgres meritdatadb" < meritdatadb.sql
