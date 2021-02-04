<?php

namespace App\Model\ValidationForm;

use App\Model\Database;

class Validator extends Database
{
    private $data;
    protected $errors = [];


    /**
     * [validates description]
     * @param  array  $data
     * @return array  Un tableaux d'erreur pour savoir où se trouve l'erreur
     */
    public function validates(array $data){
        $this->errors = [];
        $this->data = $data;
    }



    /**
     * Verifie si tous les champs sont remplies
     * @param  string $field      les champs à remplir
     * @param  string $method     la function à utiliser
     * @param  [type] $paramaters les paramètres à ajouter ou cas ou il en faudrait
     * @return [type]             Soit une erreur soit rien (dans ce cas c'est réussi)
     */
    public function validate(string $field, string $method, ...$paramaters){
        if (!isset($this->data[$field])){
            $this->errors[$field] = "Le champ $field n'est pas remplie";
        }
        else{
            call_user_func([$this, $method], $field, ...$paramaters);
        }
    }



    /**
     * Verifie la longeur minimum du champ
     * @param  string $field  Le champs à remplir
     * @param  int    $length La taille
     * @return bool           Bon ou Pas
     */
    public function minLength(string $field, int $length): bool {
        if (strlen($field) < $length){
            $this->errors[$field] = "Le champ doit avoir plus de $length caractères";
            return false;
        }
        return true;
    }

    // public function date (string $field): bool {
    //     if (DateTime::createFromFormat('Y-m-d', $this->data[$field]) === false) {
    //         $this->errors[$field] = "La date ne semble pas valide";
    //         return false;
    //     }
    //     return true;
    // }

  //   public function time (string $field): bool {
  //       if (DateTime::createFromFormat('H:i', $this->data[$field]) === false) {
  //           $this->errors[$field] = "La temps ne semble pas valide";
  //           return false;
  //       }
  //       return true;
  //   }
  //
  //   public function beforeTime(string $startField, string $endField){
  //       if ($this->time($startField) && $this->time($endField)){
  //           $start = DateTime::createFromFormat('H:i', $this->data[$startField]);
  //           $end = DateTime::createFromFormat('H:i', $this->data[$endField]);
  //
  //           if ($start->getTimestamp() > $end->getTimestamp()){
  //               $this->errors[$startField] = "Le temps doit de début ne peux pas être supèrieur au temps de fin";
  //               return false;
  //           }
  //           elseif ($start->format('H') < 8 || $end->format('H') > 18) {
  //             $this->errors[$startField] = "On ne peut réserver que entre 8h00 et 18h00";
  //             return false;
  //           }
  //           return true;
  //       }
  //       return false;
  //   }
  //
  //
  //
  //
  // public function Week_End(string $field): bool{
  //   $date = date('N', strtotime($this->data[$field]));
  //   if ($date == '7' || $date == '6') {
  //     $this->errors[$field] = "On ne peut pas reserver pendant les Week-Ends";
  //     return false;
  //   }
  //   return true;
  // }
}
