<?php
session_start();

unset($_SESSION['usuario']);

$_SESSION['msg'] = "Sessão encerrada";

header("Location: ./ ");