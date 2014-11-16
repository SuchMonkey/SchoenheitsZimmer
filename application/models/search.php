<?php

class Search extends Model {
	public function getSearchResults($searchString) {
		$query = "
			select id, contextTable as context, name, text from sz.sections
			where contextTable != 'generals'
			and lower(name) like concat('%',replace(:searchString, ' ', '%'),'%')
			or lower(text) like concat('%',replace(:searchString, ' ', '%'),'%')
			union all
			select s.id, g.keyName as context, s.name, s.text from sz.sections s, sz.generals g
			where s.contextTable = 'generals'
			and s.contextId = g.id
			and lower(s.name) like concat('%',replace(:searchString, ' ', '%'),'%')
			or lower(s.text) like concat('%',replace(:searchString, ' ', '%'),'%')
			union all
			select id, 'therapys' as context, name, description from sz.therapys
			where lower(name) like concat('%',replace(:searchString, ' ', '%'),'%')
			or lower(description) like concat('%',replace(:searchString, ' ', '%'),'%')
			union all
			select id, 'therapyunits' as context, name, shortdescription from sz.therapyunits
			where lower(name) like concat('%',replace(:searchString, ' ', '%'),'%')
			or lower(shortDescription) like concat('%',replace(:searchString, ' ', '%'),'%')
		";
		
		return $this->query($query, array(":searchString" => $searchString))->fetchAll();
	}
	
	public function getCategoryForTherapy($therapyId) {
		$query = "
			SELECT t.name as category, tu.name as unit FROM sz.therapyunits tu, sz.therapys t
			where tu.id = ?
			and tu.therapyId = t.id;
		";
		return $this->query($query, array($therapyId))->fetch();
	}
	
	public function getCategoryAndUnitForUnitsSection($sectionId) {
		$query = "
			SELECT t.name as category, tu.name as unit FROM sz.sections s, sz.therapyunits tu, sz.therapys t
			where s.id = ?
			and s.contextTable = 'units'
			and s.contextId = tu.id
			and tu.therapyId = t.id;
		";
		return $this->query($query, array($sectionId))->fetch();
	}
	
	public function getGeneralInformation() {
		return $this->query("SELECT g.name, g.text, g.imgName FROM sz.generals g WHERE g.keyName = 'search';")->fetch();
	}
}
	