#!/bin/bash

# Colores para la salida
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[0;33m'
BLUE='\033[0;34m'
NORMAL='\033[0m'

echo -e "${BLUE}Monitor de Logs de Laravel en Tiempo Real${NORMAL}"
echo -e "${YELLOW}Presiona Ctrl+C para detener${NORMAL}"
echo ""

# Monitoreando logs específicos de tareas
echo -e "${GREEN}Monitoreando logs de tareas...${NORMAL}"
tail -f storage/logs/tasks.log &
PID1=$!

# Monitoreando logs generales de Laravel
echo -e "${GREEN}Monitoreando logs generales de Laravel...${NORMAL}"
tail -f storage/logs/laravel.log &
PID2=$!

# Capturar señal para terminar adecuadamente
trap "kill $PID1 $PID2; echo -e '${RED}Monitoreo detenido${NORMAL}'; exit" INT

# Mantener el script corriendo
wait
