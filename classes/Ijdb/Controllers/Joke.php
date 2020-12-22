<?php

namespace Ijdb\Controllers;

use \Ninja\DatabaseTable;

class Joke
{
    private $jokesTable;
    private $authorsTable;

    public function __construct(DatabaseTable $jokesTable, DatabaseTable $authorsTable)
    {
        $this->jokesTable = $jokesTable;
        $this->authorsTable = $authorsTable;
    }

    public function home()
    {
        $title = 'Home';
        return [
            'title' => $title,
            'template' => 'home.html.php'
        ];
    }

    public function delete()
    {
        $this->jokesTable->delete($_POST['id']);
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/joke/list');
        exit;
    }

    public function list()
    {
        $title = 'Jokes';
        $totalJokes = $this->jokesTable->total();
        // WATCH OUT - "N + 1" Problem:
        $results = $this->jokesTable->findAll();
        $jokes = [];
        foreach ($results as $joke) {
            $author = $this->authorsTable->findById($joke['authorid']);
            $jokes[] = [
                'id' => $joke['id'],
                'joketext' => $joke['joketext'],
                'jokedate' => $joke['jokedate'],
                'name' => $author['name'],
                'email' => $author['email']
            ];
        }
        // END OF - "N + 1" Problem
        return [
            'title' => $title,
            'template' => 'jokes.html.php',
            'variables' => [
                'totalJokes' => $totalJokes,
                'jokes' => $jokes
            ]
        ];
    }

    public function saveEdit()
    {
        $joke = $_POST['joke'];
        $joke['authorid'] = 2; // TODO
        $joke['jokedate'] = new \DateTime();
        $this->jokesTable->save($joke);
        header('Location: /joke/list');
        exit;
    }

    public function save()
    {
        if (isset($_GET['jokeid'])) { // edit an existing joke
            $joke = $this->jokesTable->findById($_GET['jokeid']); // TODO authorid lo posso prendere qui
            $title = 'Edit Joke'; // if $_GET['jokeid'] was not set: a new joke
        } else {
            $title = 'Add Joke';
        }
        return [
            'title' => $title,
            'template' => 'editjoke.html.php',
            'variables' => [
                'joke' => $joke ?? ''
            ]
        ];
    }
}
