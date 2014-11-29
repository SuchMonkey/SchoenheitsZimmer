<?php

class Therapy extends Model {
	public function getCategories() {
		return $this->query('select name, shortDescription from therapys order by name;')->fetchAll();
	}
	
	public function getCategory($name) {
		return $this->query('select name, description, imgName from therapys where lower(name) = ?;', array($name))->fetch();
	}
	
	public function getUnits($category, $pulledUp = false) {
		$pulledUp = $pulledUp ? 1 : 0;
		return $this->query('select tu.name, tu.shortDescription from therapyunits tu, therapys t where tu.therapyid = t.id and lower(t.name) = ? and tu.pullLinkUp = ? order by tu.orderNumber, tu.name;', array($category, $pulledUp))->fetchAll();
	}
	
	public function getUnit($unit) {
		return $this->query('select tu.name, tu.duration, tu.price, tu.imgName, tu.shortDescription, tu.showActionsMode from therapyunits tu where lower(tu.name) = ?;', array($unit))->fetch();
	}
	
	public function getSections($unit) {
		return $this->query("SELECT s.name, s.text FROM therapyunits tu, sz.sections s where tu.id = s.contextId and s.contextTable = 'therapyunits' and lower(tu.name) = ? order by s.orderNumber asc;", array($unit))->fetchAll();
	}
	
	public function getGeneralInformation() {
		return $this->query("SELECT g.name, g.text, g.imgName FROM generals g WHERE g.keyName = 'therapy';")->fetch();
	}
	
	public function getTherapyUnitActions($unitName, $getExtras = false) {
		$isExtra = $getExtras ? 1 : 0;
		
		return $this->query('select tua.name, tua.price, tua.duration, tua.text from therapyUnitActions tua, therapyUnits tu where lower(tu.name) = ? and tua.therapyUnitId = tu.id and tua.isExtra = ? order by tua.orderNumber;', array($unitName, $isExtra))->fetchAll();
	}
}
