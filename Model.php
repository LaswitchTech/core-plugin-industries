<?php

/**
 * Core Framework - IndustriesModel
 *
 * @license    MIT (https://mit-license.org/)
 * @author     Louis Ouellet <louis@laswitchtech.com>
 */

// Import additionnal class into the global namespace
use \LaswitchTech\Core\Abstracts\Model;

class IndustriesModel extends Model {

    /**
     * Create an industry
     *
     * @param string $industry
     * @return int
     */
    public function create(string $industry): int
    {
        // Check if the industry is empty
        if(empty($industry)){
            return 0;
        }

        // Create a select Query
        $Query = $this->Database->query()
            ->table('industries')
            ->select('id')
            ->where('name', $industry);

        // Retrieve the Results
        $result = $Query->fetch();

        // Check if the Industry already exists
        if($result){
            return $result[0]['id'];
        }

        // Create the Query
        $Query = $this->Database->query()
            ->table('industries')
            ->insert(['name' => $industry]);

        // Execute the Query
        return $Query->execute();
    }
}
