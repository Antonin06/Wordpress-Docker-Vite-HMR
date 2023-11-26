.PHONY: start down

start:
		VITE_DEV_SERVER_ADDRESS=http://$(shell bin/get-host-ip-address.sh):1337 docker compose up -d

down:
		docker compose down
