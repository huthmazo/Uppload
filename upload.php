<?php

require('clases/upload.php');

$archivo = new Upload($_FILES['file']);

$archivo->upload();

