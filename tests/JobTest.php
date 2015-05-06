<?php

class JobTest extends TestCase {

	public function testValidateReturnsFalseIfAllDataIsMissing()
	{
		$validation = \App\Models\Job::validate([]);
		$this->assertEquals($validation->passes(), false);
	}

	public function testValidateReturnsFalseIfContentUrlIsInvalid()
	{
		$validation = \App\Models\Job::validate([
			'content_url' => 'fail'
		]);
		$this->assertEquals($validation->passes(), false);
	}

	public function testValidateReturnsFalseIfBudgetIsInvalid()
	{
		$validation = \App\Models\Job::validate([
			'budget' => '200'
		]);
		$this->assertEquals($validation->passes(), false);
	}

	public function testValidateReturnsTrueIfDataIsThere()
	{
		$validation = \App\Models\Job::validate([
			'title' => 'Test',
			'content_url' => 'http://example.com',
			'description' => 'Test description',
			'budget' => 200,
			'advertiser_id' => 1
		]);
		$this->assertEquals($validation->passes(), true);
	}

}
