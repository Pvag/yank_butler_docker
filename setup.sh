#!/bin/bash

rm -rf public/assets/*
gulp compileSass
cp -rp assets/* public/assets/