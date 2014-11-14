<?php

class Therapy extends Model {
	public function getCategories() {
		return $this->query('select name, shortDescription from sz.therapys;')->fetchAll();
	}
	
	public function getCategory($name) {
		return $this->query('select name, description, imgName from sz.therapys where lower(name) = ?;', array($name))->fetch();
	}
	
	public function getUnits($category) {
		return $this->query('select tu.name, tu.shortDescription from sz.therapyunits tu, sz.therapys t where tu.therapyid = t.id and lower(t.name) = ?;', array($category))->fetchAll();
	}
	
	public function getUnit($unit) {
		return $this->query('select tu.name, tu.duration, tu.price, tu.imgName from sz.therapyunits tu where lower(tu.name) = ?;', array($unit))->fetch();
	}
	
	public function getSections($unit) {
		return $this->query("SELECT s.name, s.text FROM sz.therapyunits tu, sz.sections s where tu.id = s.contextId and s.contextTable = 'therapyunits' and lower(tu.name) = ?;", array($unit))->fetchAll();
	}
	
	public function getGeneralInformation() {
		return $this->query("SELECT g.name, g.text, g.imgName FROM sz.generals g WHERE g.keyName = 'therapy';")->fetch();
	}
}
