<?php

function setLogMemory($modulo){
  echo 'memory_get_usage: ', memory_get_usage() / 1024 / 1024, 'Mb - memory_get_peak_usage: ', memory_get_peak_usage() / 1024 / 1024, 'Mb';
}