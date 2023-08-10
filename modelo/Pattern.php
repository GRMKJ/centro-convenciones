<?php
class Pattern
{
    public const DATE_TIME_ZONE = array(
        'MEX' => array('America/Cancun','America/Chihuahua','America/Hermosillo',
            'America/Matamoros','America/Mazatlan','America/Merida',
            'America/Mexico_City','America/Monterrey','America/Tijuana'));
    private const ONLY_LETTERS = "/^[a-zA-Z\sñáéíóúÁÉÍÓÚ]+$/";
    private const ONLY_NUMBER = "/^[0-9.]+$/";
    private const PHONE_NUMBER = "/^[0-9]{10}+$/";
    private const CURP = "/^[A-Z]{4}[0-9]{6}[A-Z]{8}[A-Z0-9]{2}+$/";
    private const RFC = "/^[A-Z]{4}[0-9]{6}[A-Z0-9]{3}+$/";

    /**
     * Returns a string if the param is formed only with letters
     * @return string
     */
    public static function onlyLetters(string $text){
        if($text != null && $text != "" && preg_match(self::ONLY_LETTERS , $text)){
            return $text;        
        }
        return null;
    }

    /**
     * Returns a string if the param is formated as a Mexican CURP code
     * @return string
     */
    public static function esCurp(string $text){
        if($text != null && $text != "" && preg_match(self::CURP , $text)){
            return $text;        
        }
        return null;
    }
    
    /**
     * Returns a string if the param is formated as a Mexican RFC code
     * @return string
     */
    public static function esRfc(string $text){
        if($text != null && $text != "" && preg_match(self::RFC , $text)){
            return $text;        
        }
        return null;
    }

    /**
     * Returns a string if the param is formed only with numbers
     * @return string
     */
    public static function onlyNumbers(string $number){
        if($number != null && $number != "" && preg_match(self::ONLY_NUMBER , $number)){
            return $number;        
        }
        return null;
    }

    /**
     * Returns a string if the param is formed only with 10 numbers
     * @return string
     */
    public static function phoneNumber(string $phone){
        if($phone != null && $phone != "" && preg_match(self::PHONE_NUMBER , $phone)){
            return $phone;        
        }
        return null;
    }

    /**
     * Checks that the string has a valid date format 'yyyy-mm-dd', if so returns a DateTime object 
     * @param 'yyyy-mm-dd'
     * @return DateTime object | null
     */
    
    public static function toDate(string $date){
        if ($date) {
            try {
               $date = new DateTime($date, new DateTimeZone(self::DATE_TIME_ZONE['MEX'][6]));
               return $date;
            } 
            catch (Exception $e) {  
                return null;
            } 
        }
    }

    /**
     * Returns a string if the param is a email format: email@gmail.com 
     * @return string
     */
    public static function email(string $email){
        if($email != null && $email != "" && filter_var($email, FILTER_VALIDATE_EMAIL)){
            return $email;        
        }
        return null;
    }
}
