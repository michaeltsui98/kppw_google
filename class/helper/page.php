<?php
/**
 * kekezu 分页类
 * @version 2.0
 * @auther 九江
 * encodingGBK  last-modify 2011-8-25
 *
 */
Keke_lang::load_lang_class('page');
class Page {
	public $_style = 'Pagination';
	public $_ajax = 0;
	public $_ajax_dom;
	public $_param;
	public $_data_arr = array ();
	public $_static;
	
	function setStyle($value) {
		$this->_style = $value;
	}
	function setAjax($value) {
		$this->_ajax = $value;
	}
	function setAjaxDom($value) {
		$this->_ajax_dom = $value;
	}
	function setParam($value) {
		$this->_param = $value;
	}
	function setStatic($value) {
		$this->_static = $value;
	}
	/**
	 * 生成分页html
	 *
	 * @param int $num   总页数
	 * @param int $perpage   第页多少条
	 * @param int $curpage   当前页
	 * @param string $mpurl  url
	 * @param $anchor   描点
	 * @return string
	 */
	function Pagination($num, $perpage, $curpage, $mpurl,$anchor='') {
		global $_lang;
		$Paginationpage = '';
		$this->_static or $mpurl .= strpos ( $mpurl, '?' )===false ? '?' : '&';
		
		$ajax_dom = $this->_ajax_dom;
		if ($num > $perpage) {
			$page = 10;
			$offset = 5;
			$pages = @ceil ( $num / $perpage );
			if ($page > $pages) {
				$from = 1;
				$to = $pages;
			} else {
				$from = $curpage - $offset;
				$to = $curpage + $page - $offset - 1;
				if ($from < 1) {
					$to = $curpage + 1 - $from;
					$from = 1;
					if (($to - $from) < $page && ($to - $from) < $pages) {
						$to = $page;
					}
				} elseif ($to > $pages) {
					$from = $curpage - $pages + $to;
					$to = $pages;
					if (($to - $from) < $page && ($to - $from) < $pages) {
						$from = $pages - $page + 1;
					}
				}
			}
			
			if ($this->_ajax) {
				$Paginationpage = ($curpage - $offset > 1 && $pages > $page ? "<a href=javascript:; onclick=ajaxpage('{$ajax_dom}','{$mpurl}page=1{$anchor}&count=$num,'1')>".$_lang['first_page']."</a>" : '') . ($curpage > 1 ? "<a href=javascript:; onclick=ajaxpage('{$ajax_dom}','{$mpurl}page=" . ($curpage - 1). $anchor."&count=$num','".($curpage-1)."')><<".$_lang['Previous_page']."</a> " : '');
			
			}elseif($this->_static){
				$Paginationpage = ($curpage - $offset > 1 && $pages > $page ? '<a href="' . $mpurl . '1.htm'.$anchor.'&count='.$num.' title ='.$_lang['first_page'].' "></a> ' : '') . ($curpage > 1 ? '<a href="' . $mpurl .($curpage - 1).'.htm'.$anchor. '&count='.$num.'"><<'.$_lang['Previous_page'].'</a> ' : '');
			}
			else {
				$Paginationpage = ($curpage - $offset > 1 && $pages > $page ? '<a href="' . $mpurl . 'page=1'.$anchor.'&count='.$num.'" title ="'.$_lang['first_page'].' ">&#171;</a> ' : '') . ($curpage > 1 ? '<a href="' . $mpurl . 'page=' . ($curpage - 1).$anchor. '&count='.$num.'" title ="'.$_lang['Previous_page'].' ">&#139;</a> ' : '');
			}
			
			for($i = $from; $i <= $to; $i ++) {
				if ($this->_ajax) {
					$Paginationpage .= $i == $curpage ? '<a class="selected">' . $i . '</a>' : "<a href=javascript:; onclick=ajaxpage('{$ajax_dom}','" . $mpurl . "page={$i}{$anchor}&count=$num','{$i}')>{$i}</a>";
				}
				elseif($this->_static){
					$Paginationpage .= $i == $curpage ? '<a class="selected">' . $i . '</a>' : '<a href="' . $mpurl. $i . '.htm' .$anchor. '&count='.$num.'">' . $i . '</a> ';
				} else {
					$Paginationpage .= $i == $curpage ? '<a class="selected">' . $i . '</a>' : '<a href="' . $mpurl . 'page=' . $i .$anchor. '&count='.$num.'">' . $i . '</a> ';
				}
			}
			if ($this->_ajax) {
				$Paginationpage .= ($curpage < $pages ? "<a href=javascript:; onclick=ajaxpage('{$ajax_dom}','" . $mpurl . "page=" . ($curpage + 1) ."&count=$num" .$anchor. "','".($curpage+1)."')>".$_lang['next_page'].">></a>" : '') . ($to < $pages ? " <a href=javascript:; onclick=ajaxpage('{$ajax_dom}','" . $mpurl . "page={$pages}&count=$num{$anchor}','{$pages}')>".$_lang['last_page']."</a>" : '');
				$Paginationpage = $Paginationpage ? '<span> ' . $curpage . ' / ' . $pages . $_lang['page'].' </span> ' . $Paginationpage : '';
			}elseif($this->_static){
				$Paginationpage .= ($curpage < $pages ? '<a href="' . $mpurl .($curpage + 1).'.htm'.$anchor. '">'.$_lang['next_page'].'>></a>' : '') . ($to < $pages ? ' <a href="' . $mpurl . $pages.'.htm'.$anchor. '">'.$_lang['last_page'].'</a>' : '');
				$Paginationpage = $Paginationpage ? '<span> ' . $curpage . ' / ' . $pages . $_lang['page'].'</span> ' . $Paginationpage : '';
			} else {
				$Paginationpage .= ($curpage < $pages ? '<a href="' . $mpurl . 'page=' . ($curpage + 1)."&count=$num".$anchor. '" title="'.$_lang['next_page'].' ">&#155;</a>' : '') . ($to < $pages ? ' <a href="' . $mpurl . 'page=' . $pages."&count=$num".$anchor. '" title ="'.$_lang['last_page'].'">&#187;</a>' : '');
				$Paginationpage = $Paginationpage ? '<span> ' . $curpage . ' / ' . $pages . $_lang['page'].'</span> ' . $Paginationpage : '';
			}
		}
		return $Paginationpage;
	}
	/**
	 * 
	 * 通过数组分页
	 * @param array $data
	 * @return array $page_data
	 */
	function page_by_arr($data, $page_size, $curpage, $url) {
		//数组的长度
		$count = sizeof ( $data );
		$count > 0 && $page_size > 0 and $total_pages = ceil ( $count / $page_size ) or $total_pages = 0;
		$curpage > $total_pages and $curpage = $total_pages;
		$total_pages != 1 ? $offset = $curpage * $page_size : $offset = 0;
//		$offset = $curpage * $page_size;
//		var_dump($data,$offset,$page_size);die();
		$d = array_slice ( $data, $offset, $page_size );
		$style = $this->_style;
		$page ['page'] = $this->$style ( $count, $page_size, $curpage, $url );
		$page ['data'] = $d;
		return $page;
	}
	
	/**
	 * 分页方法
	 *
	 * @param  $count 总记录数
	 * @param  $limit 每页多少条
	 * @param  $curpage 当前页数
	 * @param  $url 当前URl
	 * @param $anchor 锚点
	 * @return array(page,where)
	 */
	function getPages($count, $limit, $curpage, $url,$anchor='') {
		$count = intval($count);
		$limit = intval($limit);
		$style = $this->_style;
		if ($count > 0 && $limit > 0) {
			$total_pages = ceil ( $count / $limit );		
		} else {
			$total_pages = 0;
		}
		if ($curpage > $total_pages) {
			$curpage = $total_pages;
		}
		
		$start = $limit * $curpage - $limit;
		if ($start < 0){
			$start = 0;
		}
		$where = '';
		$where .= " limit " . $start . " ," . $limit;
		$page ['page'] = $this->$style ( $count, $limit, $curpage, $url,$anchor );
		$page ['where'] = $where;
		return $page;
	}
}
