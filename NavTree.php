<?php

class NavTree
	{
	    protected $tree;
		
	    public function __construct($data)
		{
		    $this->tree = $this->buildTree($data, 'parentId', 'id');
		}

        protected function buildTree($flat, $pidKey, $idKey = null)
        {
            $grouped = array();
            foreach ($flat as $sub){
                $grouped[$sub[$pidKey]][] = $sub;
            }

            $fnBuilder = function($siblings) use (&$fnBuilder, $grouped, $idKey) {
                foreach ($siblings as $k => $sibling) {
                    $id = $sibling[$idKey];
                    if(isset($grouped[$id])) {
                        $sibling['children'] = $fnBuilder($grouped[$id]);
                    }
                    $siblings[$k] = $sibling;
                }
                return $siblings;
            };

            $tree = $fnBuilder($grouped[0]);
            return $tree;
        }

	    private function internalRender($nodes)
	    {
	        echo "<ul>";
	        foreach($nodes as $node) {
	            echo "<li>{$node['name']}";
			    if (isset($node['children'])) {
			        $this->internalRender($node['children']);
			    }
			    echo "</li>";
		    }
		    echo"</ul>";
	    }
	    
		public function render()
		{
		    echo '<nav>';
		    $this->internalRender($this->tree);
			echo '</nav>';
	    }
	}
	