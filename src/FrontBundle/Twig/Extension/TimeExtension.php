<?php


namespace FrontBundle\Twig\Extension;
use Doctrine\ORM\EntityManagerInterface ;


class TimeExtension extends  \Twig_Extension
{





  public function __construct()
    {
        
    
    }




public function getTime( $ptime )
{
    $t=strtotime($ptime);

    $estimate_time = time() - $t;

    if( $estimate_time < 1 )
    {
        return 'less than 1 second ago';
    }

    $condition = array( 
                12 * 30 * 24 * 60 * 60  =>  'ans',
                30 * 24 * 60 * 60       =>  'mois',
                24 * 60 * 60            =>  'jour',
                60 * 60                 =>  'heure',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $estimate_time / $secs;

        if( $d >= 1 )
        {
            $r = round( $d );
            return  'il ya '. $r . ' ' . $str . ( $r > 1 ? 's' : '' ) ;
        }
    }
}




   /**
     * Return the functions registered as twig extensions
     *
     * @return array
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('time', array($this,'getTime')),
        );
    }






    public function getName()
    {
        return "FrontBundle:TimeExtension";
    }







}