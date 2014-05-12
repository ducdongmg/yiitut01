<?php
	require_once("XML/Unserializer.php");
	
	/**
	 * XMLより配列に変換
	 * Unserializer@Pear のソフト化
	 */
	
	class XMLToArray extends XML_Unserializer {
		function __construct(){
			XML_Unserializer::XML_Unserializer();
		}
		
		public function init(){
			$this->setOption('parseAttributes', TRUE);	//属性のパース
			$this->setOption('complexType', "array");	//レスポンスオブジェクト
		}
		
		public function parse($xml){
			$status = $this->unserialize($xml);
			
			if (PEAR::isError($status)) {
			    return null;
			}
			
			$array = $this->getUnserializedData();
			return $array;
		}
	}
	
