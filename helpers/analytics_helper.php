<?php defined('SYSPATH') or die('No direct script access.');

class analytics_helper_Core {

    /**
     * Create chart type form elements
     *
     * @param string $type the type of input of the form
     * @param string $name the name of the input to set
     * @param string $class the name of the class to use for input element
     * @return A series of form elements that allow the selection of valid chart types
     */
    public static function select_chart_type( $type, $name, $class )
    {
        $chart_types = array( "pie", "line", "bar" );
        $html = '';
        foreach( $chart_types as $chart_type )
        {
            $html .= "<label>$chart_type";
            $html .= "<input class=\"$class\" type=\"$type\" name=\"$name\" value=\"$chart_type\" /><br />";
            $html .= "</label>";
        }

        return $html;
    }

    /**
     * Create form elements to select cumulative incidents
     *
     * @param string $type the type of input to create
     * @param string $name the name of the input to set
     * @param string $class the class to use for the input
     * @return A series of form elements that allows the selection of cumulative or daily events
     */
    public static function select_cumulative( $type, $name, $class )
    {
        $html = "";
        $html .= "<label>true";
        $html .= "<input class=\"$class\" type=\"$type\" name=\"$name\" value=\"true\" /><br />";
        $html .= "</label>";
        $html .= "<label>false";
        $html .= "<input class=\"$class\" type=\"$type\" name=\"$name\" value=\"false\" /><br />";
        $html .= "</label>";

        return $html;
    }

    /**
     * Create form elements to select category
     *
     * @param string $type the type of input to create
     * @param string $name the name of the input to set
     * @param string $class the class to use for the input
     * @return A series of form elements that allows the selection of categories
     */
    public static function select_category( $type, $name, $class )
    {
        $db = new Analytics_Model;  

        $html = '';
        $categories = $db->get_categories();
        foreach( $categories as $category )
        {
            $html .= "<label>$category->category_title";
            $html .= "<input class=\"$class\" type=\"$type\" name=\"$name\" value=\"$category->category_id\" /><br />";
            $html .= "</label>";
        }

        return $html;
    }

    /**
     * Create form elements to select country
     *
     * @param string $type the type of input to create
     * @param string $name the name of the input to set
     * @param string $class the class to use for the input
     * @return A series of form elements that allows the selection of country
     */
    public static function select_country( $type, $name, $class )
    {
        $db = new Analytics_Model;  

        $html = '';
        $countries = $db->get_countries();
        foreach( $countries as $country )
        {
            $html .= "<label>$country->country_name";
            $html .= "<input class=\"$class\" type=\"$type\" name=\"$name\" value=\"$country->country_id\" /><br />";
            $html .= "</label>";
        }

        return $html;
    }
}
