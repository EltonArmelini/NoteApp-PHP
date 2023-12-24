<?php 

namespace BasicApp\Noteapp\models;
use BasicApp\Noteapp\lib\Database; 
use PDO;

class Note extends Database{


    private string $uuid;
    
    public function __construct(private string $title,private string $content ) {
        parent::__construct();

        $this->uuid = uniqid();

    }

    public function save(){
        $query = $this->connection()->prepare("INSERT INTO notes(uuid,title,content,updated) VALUES (:uuid,:title, :content,NOW())");
        $query->execute(
            ['title'=>$this->title,
            'uuid'=>$this->uuid,
            'content'=>$this->content
            ]
        ); 

    }
    public function update(){
        $query = $this->connection()->prepare("UPDATE notes SET title = :title, title = :content, update = NOW() WHERE uuid = :uuid");
        $query->execute(
            ['title'=>$this->title,
             'uuid'=>$this->uuid,
             'content'=>$this->content
            ]
        ); 

    }

    public static function get($uuid){

        $db = new Database; 
        $query = $db->connection()->prepare("SELECT * FROM notes WHERE uuid = :uuid");
        $query->execute([':uuid'=>$uuid]); 
        $note = Note::createFromArray($query->fetch(PDO::FETCH_ASSOC));
        return $note;
    }

    public static function createFromArray($arr):Note
    {
        $note = new Note($arr['title'],$arr['content']); 
        $note->setUuid($arr['uuid']);
        return $note;
    }



    // Getter y Setter para UUID
    public function getUuid(): string {
        return $this->uuid;
    }

    public function setUuid($uuid) {
        $this->uuid = $uuid;
    }

    // Getter y Setter para Content
    public function getContent(): string {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    // Getter y Setter para Title
    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }
}