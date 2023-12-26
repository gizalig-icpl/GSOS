# Store the container ID in a variable
gsos=$(docker ps -q --filter "publish=9015")

# Find volumes associated with the container and store the output in another variable
gsos_volume=$(docker inspect -f '{{range .Mounts}}{{.Name}} {{end}}' "$gsos")

# Stop and remove the container
docker stop "$gsos"
docker rm "$gsos"

# Remove the associated volumes
docker volume rm $gsos_volume

# Store the container ID in a variable
simplerisk=$(docker ps -q --filter "publish=4415")

# Find volumes associated with the container and store the output in another variable
simplerisk_volume=$(docker inspect -f '{{range .Mounts}}{{.Name}} {{end}}' "$simplerisk")

# Stop and remove the container
docker stop "$simplerisk"
docker rm "$simplerisk"

# Remove the associated volumes
docker volume rm $simplerisk_volume

# Store the container ID in a variable
maryadb=$(docker ps -q --filter "publish=3315")

# Find volumes associated with the container and store the output in another variable
maryadb_volume=$(docker inspect -f '{{range .Mounts}}{{.Name}} {{end}}' "$maryadb")

# Stop and remove the container
docker stop "$maryadb"
docker rm "$maryadb"

# Remove the associated volumes
docker volume rm $maryadb_volume
