<?php

function env() {
  return settings('env') ?? ENV_DEV;
}

function dev() {
    return (env() == ENV_DEV);
}

function prod() {
  return (env() == ENV_PROD);
}
