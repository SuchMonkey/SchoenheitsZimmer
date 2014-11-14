<?php

class Price extends Model {
	public function getCategories() {
		return $this->query('select name from sz.therapys;')->fetchAll();
	}
	
	public function getCategory($name) {
		return $this->query('select name, description from sz.therapys where lower(name) = ?;', array($name))->fetch();
	}
	
	public function getUnits($category) {
		return $this->query('select tu.name, tu.price, tu.duration, tu.keyPoints from sz.therapyunits tu, sz.therapys t where tu.therapyid = t.id and lower(t.name) = ?;', array($category))->fetchAll();
	}
	
	public function getExtras($category) {
		return $this->query('select e.name, e.price from sz.extras e, sz.therapys t where e.therapyid = t.id and lower(t.name) = ?;', array($category))->fetchAll();
	}
	
	public function getGeneralInformation() {
		return $this->query("SELECT g.name, g.text, g.imgName FROM sz.generals g WHERE g.keyName = 'price';")->fetch();
	}
}
	