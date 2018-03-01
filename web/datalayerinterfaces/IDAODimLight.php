<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author gydo194
 */
interface IDAODimLight {
    public function getDimLight(int $id): DimLight;
    
    public function updateDimLight(DimLight $dl);
    public function createDimLight(DimLight $dl);
    public function deleteDimLight(DimLight $dl);
}
