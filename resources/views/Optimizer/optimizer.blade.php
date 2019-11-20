@extends('layouts.app')

@section('content')


@php
$wholeChicDemand;
$wholeChicDemandUnit;
$wholeChicPriceKg;
$wholeChicWeightQty;


$breastDemand;
$breastDemandUnit;
$breastPriceKg;
$breastWeightQty;

$wingDemand;
$wingDemandUnit;
$wingPriceKg;
$wingWeightQty;


$drumDemand;
$drumDemandUnit;
$drumPriceKg;
$drumWeightQty;


$thighDemand;
$thighDemandUnit;
$thighPriceKg;
$thighWeightQty;



$fullDemand;
$fullDemandUnit;
$fullPriceKg;
$fullWeightQty;


$stock;
$stock_unit;


@endphp



@foreach($data as $data)


@if($data->pro_name =='Ayam Bulat')

@php
$wholeChicDemand = $data->pro_demand;
$wholeChicDemandUnit = $data->dem_unit;
$wholeChicPriceKg = $data->price_per_kg;
$wholeChicWeightQty = $data->weight_per_qty;

if($wholeChicDemandUnit == 'Kg')
{
	$QtyWholeChic = $wholeChicDemand/$wholeChicWeightQty;
	$QtyWholeChic = round($QtyWholeChic);
	$oriWholeChic = $QtyWholeChic;
}
else
{
	$QtyWholeChic = round($wholeChicDemand);
	$oriWholeChic = $QtyWholeChic;
}

if($data->stock_name == 'Ayam')
{
	$stock = $data->stock_qty;
	$stock_unit = $data->stock_unit;

	if($stock_unit == 'Kg')
	{
		$stockQty = $stock/$wholeChicWeightQty;
		$stockQty = round($stockQty);
		$oriStockQty = $stockQty;
	}
	else
	{
		$stockQty = round($stock);
		$oriStockQty = $stockQty;
	}
}


@endphp



@elseif($data->pro_name =='Dada')


@php
$breastDemand = $data->pro_demand;
$breastDemandUnit = $data->dem_unit;
$breastPriceKg = $data->price_per_kg;
$breastWeightQty = $data->weight_per_qty;

if($breastDemandUnit == 'Kg')
{
	$QtyBreast = $breastDemand/$breastWeightQty;
	$QtyBreast = round($QtyBreast);
	$oriBreast = $QtyBreast;
}
else
{
	$QtyBreast = round($breastDemand);
	$oriBreast = $QtyBreast;
}



@endphp




@elseif($data->pro_name =='Kepak')

@php
$wingDemand = $data->pro_demand;
$wingDemandUnit = $data->dem_unit;
$wingPriceKg = $data->price_per_kg;
$wingWeightQty = $data->weight_per_qty;

if($wingDemandUnit == 'Kg')
{
	$QtyWing = $wingDemand/$wingWeightQty;
	$QtyWing = round($QtyWing);
	$oriWing = $QtyWing;
}
else
{
	$QtyWing = round($wingDemand);
	$oriWing = $QtyWing;
}


@endphp




@elseif($data->pro_name =='Drumstik')

@php
$drumDemand = $data->pro_demand;
$drumDemandUnit = $data->dem_unit;
$drumPriceKg = $data->price_per_kg;
$drumWeightQty = $data->weight_per_qty;

if($drumDemandUnit == 'Kg')
{
	$QtyDrum = $drumDemand/$drumWeightQty;
	$QtyDrum = round($QtyDrum);
	$oriDrum = $QtyDrum;
}
else
{
	$QtyDrum = round($drumDemand);
	$oriDrum = $QtyDrum;
}


@endphp




@elseif($data->pro_name =='Paha')

@php
$thighDemand = $data->pro_demand;
$thighDemandUnit = $data->dem_unit;
$thighPriceKg = $data->price_per_kg;
$thighWeightQty = $data->weight_per_qty;

if($thighDemandUnit == 'Kg')
{
	$QtyThigh = $thighDemand/$thighWeightQty;
	$QtyThigh = round($QtyThigh);
	$oriThigh = $QtyThigh;
}
else
{
	$QtyThigh = round($thighDemand);
	$oriThigh = $QtyThigh;
}


@endphp



@elseif($data->pro_name =='Peha Penuh')

@php
$fullDemand = $data->pro_demand;
$fullDemandUnit = $data->dem_unit;
$fullPriceKg = $data->price_per_kg;
$fullWeightQty = $data->weight_per_qty;

if($fullDemandUnit == 'Kg')
{
	$QtyFull = $fullDemand/$fullWeightQty;
	$QtyFull = round($QtyFull);
	$oriFull = $QtyFull;
}
else
{
	$QtyFull = round($fullDemand);
	$oriFull = $QtyFull;
}


@endphp




@endif


@endforeach


@php

class Cut
{
	public $CutName;
	public $sale;
}

$CutA = new Cut();
$CutA->CutName = 'A';
$CutA->sale = $wholeChicWeightQty*$wholeChicPriceKg;
$saleA = $CutA->sale;


$CutB = new Cut();
$CutB->CutName = 'B';
$CutB->sale = 2*(($wingWeightQty*$wingPriceKg)+($breastWeightQty*$breastPriceKg)+($drumWeightQty*$drumPriceKg)+($thighWeightQty*$thighPriceKg));
$saleB = $CutB->sale;


$CutC = new Cut();
$CutC->CutName = 'C';
$CutC->sale=2*(($wingWeightQty*$wingPriceKg)+($breastWeightQty*$breastPriceKg)+($fullWeightQty*$fullPriceKg));
$saleC = $CutC->sale;

$CutD = new Cut();
$CutD->CutName = 'D';
$CutD->sale=(2*($wingWeightQty*$wingPriceKg))+(2*($breastWeightQty*$breastPriceKg))+($drumWeightQty*$drumPriceKg)+($thighWeightQty*$thighPriceKg)+($fullWeightQty*$fullPriceKg);
$saleD = $CutD->sale;


$Cuts = array($CutA, $CutB, $CutC, $CutD);


@endphp


@php

function sort_objects_by_total($a, $b) {
if($a->sale == $b->sale){ return 0 ; }
return ($a->sale > $b->sale) ? -1 : 1;
}

usort($Cuts, 'sort_objects_by_total');

@endphp



@php

$numChicWing = round($QtyWing/2);
$numChicBreast = round($QtyBreast/2);
$numChicDrum = round($QtyDrum/2);
$numChicThigh = round($QtyThigh/2);
$numChicFull = round($QtyFull/2);




class selectCutB
{
	public $name;
	public $numB;
}

class selectCutC
{
	public $name;
	public $numC;
}

class selectCutD
{
	public $name;
	public $numD;
}



$wing = new selectCutB();
$wing->name = 'Wing';
$wing->numB = $numChicWing;


$breast = new selectCutB();
$breast->name = 'Breast';
$breast->numB = $numChicBreast;

$drum = new selectCutB();
$drum->name = 'Drum';
$drum->numB = $numChicDrum;


$thigh = new selectCutB();
$thigh->name = 'Thigh';
$thigh->numB = $numChicThigh;

$selectCutsB = array($wing, $breast, $drum, $thigh);


function sort_objects_by_numB($a, $b) {
if($a->numB == $b->numB){ return 0 ; }
return ($a->numB < $b->numB) ? -1 : 1;
}

usort($selectCutsB, 'sort_objects_by_numB');






foreach($selectCutsB as $B)
{
	
	$leastB = $B->numB;
	$leastNameB = $B->name;
	break;
}






$wing = new selectCutC();
$wing->name = 'Wing';
$wing->numC = $numChicWing;

$breast = new selectCutC();
$breast->name = 'Breast';
$breast->numC = $numChicBreast;


$full = new selectCutC();
$full->name = 'Full';
$full->numC = $numChicFull;

$selectCutsC = array($wing, $breast, $full);


function sort_objects_by_numC($a, $b) {
if($a->numC == $b->numC){ return 0 ; }
return ($a->numC < $b->numC) ? -1 : 1;
}

usort($selectCutsC, 'sort_objects_by_numC');


foreach($selectCutsC as $C)
{
	
	$leastC = $C->numC;
	$leastNameC = $C->name;
	
	break;
}





$wing = new selectCutD();
$wing->name = 'Wing';
$wing->numD = $numChicWing;


$breast = new selectCutD();
$breast->name = 'Breast';
$breast->numD = $numChicBreast;

$drum = new selectCutD();
$drum->name = 'Drum';
$drum->numD = $numChicDrum;


$thigh = new selectCutD();
$thigh->name = 'Thigh';
$thigh->numD = $numChicThigh;

$full = new selectCutD();
$full->name = 'Full';
$full->numD = $numChicFull;

$selectCutsD = array($wing, $breast, $drum, $thigh, $full);

function sort_objects_by_numD($a, $b) {
if($a->numD == $b->numD){ return 0 ; }
return ($a->numD < $b->numD) ? -1 : 1;
}

usort($selectCutsD, 'sort_objects_by_numD');


foreach($selectCutsD as $D)
{
	
	$leastD = $D->numD;
	$leastNameD = $D->name;
	
	break;
}





$lessdemandWholeChic;
$greatdemandWholeChic;
$lessdemandWing;
$greatdemandWing;
$lessdemandBreast;
$greatdemandBreast;
$lessdemandThigh;
$greatdemandThigh;
$lessdemandDrum;
$greatdemandDrum;


class optimizer
{
	public $cutType;
	public $profit;
}

foreach($Cuts as $Cut)
{
	if($Cut->CutName == 'A')
	{
		$opA = new optimizer();
		$opA->cutType = 'A';
		$opA->profit = $Cut->sale * $QtyWholeChic;
		$profitA = $opA->profit;

		
	}
	else if($Cut->CutName == 'B')
	{
		$opB = new optimizer();
		$opB->cutType = 'B';
		
		
		for($i=0;$i<1;$i++)
		{
			
			$opB->sale = $Cut->sale;
			
			$profitB = $opB->sale * ($leastB);
			

		}
	}
	else if($Cut->CutName == 'C')
	{
		$opC = new optimizer();
		$opC->cutType = 'C';

		for($i=0;$i<1;$i++)
		{
			
			$opC->sale = $Cut->sale;
			
			$profitC = $opC->sale * ($leastC);
			
		}
	}
	else if($Cut->CutName == 'D')
	{
		$opD = new optimizer();
		$opD->cutType = 'D';

		
		for($i=0;$i<1;$i++)
		{
			
			$opD->sale = $Cut->sale;
			
			$profitD = $opD->sale * ($leastD);
			
		}

	}
}




class finalOp
{
	public $typeCut;
	public $finalProfit;
}

$typeA = new finalOp();
$typeA->typeCut = 'A';
$typeA->finalProfit = $profitA;


$typeB = new finalOp();
$typeB->typeCut = 'B';
$typeB->finalProfit = $profitB;

$typeC = new finalOp();
$typeC->typeCut = 'C';
$typeC->finalProfit = $profitC;


$typeD = new finalOp();
$typeD->typeCut = 'D';
$typeD->finalProfit = $profitD;


$final = array($typeA, $typeB, $typeC, $typeD);

function sort_objects_by_finalProfit($a, $b) {
if($a->finalProfit == $b->finalProfit){ return 0 ; }
return ($a->finalProfit > $b->finalProfit) ? -1 : 1;
}

usort($final, 'sort_objects_by_finalProfit');

foreach($final as $f)
{
	
}



foreach($final as $f)
{

	if($f->typeCut == 'A')
	{
		if($QtyWholeChic <= $stockQty)
		{
			$stockQty = $stockQty - $QtyWholeChic;
			$outputA = $QtyWholeChic;
			$totalProfitA = $outputA * $saleA;
			$QtyWholeChic = 0; 
		}
		else if($QtyWholeChic > $stockQty)
		{
			$outputA = $stockQty;
			$totalProfitA = $outputA * $saleA;
			$QtyWholeChic = $QtyWholeChic - $stockQty;
			$stockQty = 0;
		}
	}
	else if($f->typeCut == 'B')
	{
		if($numChicWing == 0 || $numChicBreast == 0 || $numChicDrum == 0 || $numChicThigh == 0)
		{
			$outputB = 0;
			$totalProfitB = 0;
		}
		else
		{
			if($leastNameB =='Wing')
			{
				if($numChicWing <= $stockQty)
				{
					$stockQty = $stockQty - $numChicWing;
					$outputB = $numChicWing;
					$totalProfitB = $outputB * $saleB;
					$numChicBreast = $numChicBreast - $outputB;
					$numChicDrum = $numChicDrum - $outputB;
					$numChicThigh = $numChicThigh - $outputB;
					$numChicWing = 0;
				}
				else if($numChicWing > $stockQty)
				{
					$outputB = $stockQty;
					$totalProfitB = $outputB * $saleB;
					$numChicWing = $numChicWing - $outputB;
					$numChicBreast = $numChicBreast - $outputB;
					$numChicDrum = $numChicDrum - $outputB;
					$numChicThigh = $numChicThigh - $outputB;
					$stockQty = 0;
				}
			}
			else if($leastNameB == 'Breast')
			{
				if($numChicBreast <= stockQty)
				{
					$stockQty = $stockQty - $numChicBreast;
					$outputB = $numChicBreast;
					$totalProfitB = $outputB * $saleB;
					$numChicWing = $numChicWing - $outputB;
					$numChicDrum = $numChicDrum - $outputB;
					$numChicThigh = $numChicThigh - $outputB;
					$numChicBreast = 0;
				}
				else if($numChicBreast > stockQty)
				{
					$outputB = $stockQty;
					$totalProfitB = $outputB * $saleB;
					$numChicBreast = $numChicBreast - $outputB;
					$numChicWing = $numChicWing - $outputB;
					$numChicDrum = $numChicDrum - $outputB;
					$numChicThigh = $numChicThigh - $outputB;
					$stockQty = 0;
				}
			}
			else if($leastNameB == 'Drum')
			{
				if($numChicDrum <= $stockQty)
				{
					$stockQty = $stockQty - $numChicDrum;
					$outputB = $numChicDrum;
					$totalProfitB = $outputB * $saleB;
					$numChicWing = $numChicWing - $outputB;
					$numChicBreast = $numChicBreast - $outputB;
					$numChicThigh = $numChicThigh - $outputB;
					$numChicDrum = 0;
				}
				else if($numChicDrum > $stockQty)
				{
					$outputB = $stockQty;
					$totalProfitB = $outputB * $saleB;
					$numChicDrum = $numChicDrum - $outputB;
					$numChicWing = $numChicWing - $outputB;
					$numChicBreast = $numChicBreast - $outputB;
					$numChicThigh = $numChicThigh - $outputB;
					$stockQty = 0;
				}
			}
			else if($leastNameB == 'Thigh')
			{
				if($numChicThigh <= $stockQty)
				{
					$stockQty = $stockQty - $numChicThigh;
					$outputB = $numChicThigh;
					$totalProfitB = $outputB * $saleB;
					$numChicWing = $numChicWing - $outputB;
					$numChicBreast = $numChicBreast - $outputB;
					$numChicDrum = $numChicDrum - $outputB;
					$numChicThigh = 0;
				}
				else if($numChicThigh > $stockQty)
				{
					$outputB = $stockQty;
					$totalProfitB = $outputB * $saleB;
					$numChicThigh = $numChicThigh - $outputB;
					$numChicWing = $numChicWing - $outputB;
					$numChicBreast = $numChicBreast - $outputB;
					$numChicDrum = $numChicDrum - $outputB;
					$stockQty = 0;
				}
			}
		}
		
	}
	else if($f->typeCut == 'C')
	{
		if($numChicWing == 0 || $numChicBreast == 0 || $numChicFull == 0)
		{
			$outputC = 0;
			$totalProfitC = 0;
		}
		else
		{
			if($leastNameC =='Wing')
			{
				if($numChicWing <= $stockQty)
				{
					$stockQty = $stockQty - $numChicWing;
					$outputC = $numChicWing;
					$totalProfitC = $outputC * $saleC;
					$numChicBreast = $numChicBreast - $outputC;
					$numChicDrum = $numChicDrum - $outputC;
					$numChicThigh = $numChicThigh - $outputC;
					$numChicWing = 0;
				}
				else if($numChicWing > $stockQty)
				{
					$outputC = $stockQty;
					$totalProfitC = $outputC * $saleC;
					$numChicWing = $numChicWing - $outputC;
					$numChicBreast = $numChicBreast - $outputC;
					$numChicDrum = $numChicDrum - $outputC;
					$numChicThigh = $numChicThigh - $outputC;
					$stockQty = 0;
				}
			}
			else if($leastNameC == 'Breast')
			{
				if($numChicBreast <= stockQty)
				{
					$stockQty = $stockQty - $numChicBreast;
					$outputC = $numChicBreast;
					$totalProfitC = $outputC * $saleC;
					$numChicWing = $numChicWing - $outputC;
					$numChicDrum = $numChicDrum - $outputC;
					$numChicThigh = $numChicThigh - $outputC;
					$numChicBreast = 0;
				}
				else if($numChicBreast > stockQty)
				{
					$outputC = $stockQty;
					$totalProfitC = $outputC * $saleC;
					$numChicBreast = $numChicBreast - $outputC;
					$numChicWing = $numChicWing - $outputC;
					$numChicDrum = $numChicDrum - $outputC;
					$numChicThigh = $numChicThigh - $outputC;
					$stockQty = 0;
				}
			}
			else if($leastNameC == 'Full')
			{
				if($numChicFull <= $stockQty)
				{
					$stockQty = $stockQty - $numChicFull;
					$outputC = $numChicFull;
					$totalProfitC = $outputC * $saleC;
					$numChicWing = $numChicWing - $outputC;
					$numChicBreast = $numChicBreast - $outputC;
					$numChicFull = 0;
				}
				else if($numChicFull > $stockQty)
				{
					$outputC = $stockQty;
					$totalProfitC = $outputC * $saleC;
					$numChicFull = $numChicFull - $outputC;
					$numChicWing = $numChicWing - $outputC;
					$numChicBreast = $numChicBreast - $outputC;
					$stockQty = 0;
				}
			}
		}
	}
	else if($f->typeCut == 'D')
	{
		if($numChicWing == 0 || $numChicBreast == 0 || $numChicFull == 0 || $numChicDrum == 0 || $numChicThigh == 0 || $numChicFull == 0)
		{
			$outputD = 0;
			$totalProfitD = 0;
		}
		else
		{
			if($leastNameD =='Wing')
			{
				if($numChicWing <= $stockQty)
				{
					$stockQty = $stockQty - $numChicWing;
					$outputD = $numChicWing;
					$totalProfitD = $outputD * $saleD;
					$numChicBreast = $numChicBreast - $outputD;
					$numChicDrum = $numChicDrum - $outputD;
					$numChicThigh = $numChicThigh - $outputD;
					$numChicFull = $numChicFull - $outputD;
					$numChicWing = 0;
				}
				else if($numChicWing > $stockQty)
				{
					$outputD = $stockQty;
					$totalProfitD = $outputD * $saleD;
					$numChicWing = $numChicWing - $outputD;
					$numChicBreast = $numChicBreast - $outputD;
					$numChicDrum = $numChicDrum - $outputD;
					$numChicThigh = $numChicThigh - $outputD;
					$numChicFull = $numChicFull - $outputD;
					$stockQty = 0;
				}	
			}
			else if($leastNameD == 'Breast')
			{
				if($numChicBreast <= stockQty)
				{
					$stockQty = $stockQty - $numChicBreast;
					$outputD = $numChicBreast;
					$totalProfitD = $outputD * $saleD;
					$numChicWing = $numChicWing - $outputD;
					$numChicDrum = $numChicDrum - $outputD;
					$numChicThigh = $numChicThigh - $outputD;
					$numChicFull = $numChicFUll - $outputD;
					$numChicBreast = 0;
				}
				else if($numChicBreast > stockQty)
				{
					$outputD = $stockQty;
					$totalProfitD = $outputD * $saleD;
					$numChicBreast = $numChicBreast - $outputD;
					$numChicWing = $numChicWing - $outputD;
					$numChicDrum = $numChicDrum - $outputD;
					$numChicThigh = $numChicThigh - $outputD;
					$numChicFull = $numChicFull - $outputD;
					$stockQty = 0;
				}
			}
			else if($leastNameD == 'Drum')
			{
				if($numChicDrum <= $stockQty)
				{
					$stockQty = $stockQty - $numChicDrum;
					$outputD = $numChicDrum;
					$totalProfitD = $outputD * $saleD;
					$numChicWing = $numChicWing - $outputD;
					$numChicBreast = $numChicBreast - $outputD;
					$numChicThigh = $numChicThigh - $outputD;
					$numChicFull = $numChicFull - $outputD;
					$numChicDrum = 0;
				}
				else if($numChicDrum > $stockQty)
				{
					$outputD = $stockQty;
					$totalProfitD = $outputD * $saleD;
					$numChicDrum = $numChicDrum - $outputD;
					$numChicWing = $numChicWing - $outputD;
					$numChicBreast = $numChicBreast - $outputD;
					$numChicThigh = $numChicThigh - $outputD;
					$numChicFull = $numChicFull - $outputD;
					$stockQty = 0;
				}
			}
			else if($leastNameD == 'Thigh')
			{
				if($numChicThigh <= $stockQty)
				{
					$stockQty = $stockQty - $numChicThigh;
					$outputD = $numChicThigh;
					$totalProfitD = $outputD * $saleD;
					$numChicWing = $numChicWing - $outputD;
					$numChicBreast = $numChicBreast - $outputD;
					$numChicDrum = $numChicDrum - $outputD;
					$numChicFull = $numChicFull - $outputD;
					$numChicThigh = 0;
				}
				else if($numChicThigh > $stockQty)
				{
					$outputD = $stockQty;
					$totalProfitD = $outputD * $saleD;
					$numChicThigh = $numChicThigh - $outputD;
					$numChicWing = $numChicWing - $outputD;
					$numChicBreast = $numChicBreast - $outputD;
					$numChicDrum = $numChicDrum - $outputD;
					$numChicFull = $numChicFull - $outputD;
					$stockQty = 0;
				}
			}
			else if($leastNameD == 'Full')
			{
				if($numChicFull <= $stockQty)
				{
					$stockQty = $stockQty - $numChicFull;
					$outputD = $numChicFull;
					$totalProfitD = $outputD * $saleD;
					$numChicWing = $numChicWing - $outputD;
					$numChicBreast = $numChicBreast - $outputD;
					$numChicDrum = $numChicDrum - $outputD;
					$numChicThigh = $numChicThigh - $outputD;
					$numChicFull = 0;
				}
				else if($numChicFull > $stockQty)
				{
					$outputD = $stockQty;
					$totalProfitD = $outputD * $saleD;
					$numChicFull = $numChicFull - $outputD;
					$numChicWing = $numChicWing - $outputD;
					$numChicBreast = $numChicBreast - $outputD;
					$numChicDrum = $numChicDrum - $outputD;
					$numChicThigh = $numChicThigh - $outputD;
					$stockQty = 0;
				}
			}
		}
	}
}

$extraWholeChic = 0;
$extraWing = 0;
$extraBreast = 0;
$extraDrum = 0;
$extraThigh = 0;
$extraFull = 0;

foreach($final as $f)
{
	if($stockQty > 0)
	{
		if($f->typeCut == 'A')
		{
			$QtyWholeChic = $QtyWholeChic - $stockQty;

			if($QtyWholeChic < 0)
			{
				$extraWholeChic = (-1 * $QtyWholeChic);
				$QtyWholeChic = 0;
			}

			$outputA = $outputA + $stockQty;
			$totalProfitA = $outputA * saleA;
			$stockQty = 0;
			
		}
		else if($f->typeCut == 'B')
		{
			
			$numChicWing = $numChicWing - $stockQty;
			$numChicBreast = $numChicBreast - $stockQty;
			$numChicDrum = $numChicDrum - $stockQty;
			$numChicThigh = $numChicThigh - $stockQty;

			if($numChicWing < 0)
			{
				$extraWing = (-1 * $numChicWing);
				$numChicWing = 0;
			}

			if($numChicBreast < 0)
			{
				$extraBreast = (-1 * $numChicBreast);
				$numChicBreast = 0;
			}

			if($numChicDrum < 0)
			{
				$extraDrum = (-1 * $numChicDrum);
				$numChicDrum = 0;
			}

			if($numChicThigh < 0)
			{
				$extraThigh = (-1 * $numChicThigh);
				$numChicThigh = 0;
			}

			$outputB = $outputB + $stockQty;
			$totalProfitB = $outputB * $saleB;
			$stockQty = 0;
		}
		else if($f->typeCut == 'C')
		{
			$numChicWing = $numChicWing - $stockQty;
			$numChicBreast = $numChicBreast - $stockQty;
			$numChicFull = $numChicFull - $stockQty;

			if($numChicWing < 0)
			{
				$extraWing = (-1 * $numChicWing);
				$numChicWing = 0;
			}

			if($numChicBreast < 0)
			{
				$extraBreast = (-1 * $numChicBreast);
				$numChicBreast = 0;
			}

			if($numChicFull < 0)
			{
				$extraFull = (-1 * $numChicFull);
				$numChicFull = 0;
			}

			$outputC = $outputC + $stockQty;
			$totalProfitC = $outputC * saleC;
			$stockQty = 0;

		}
		else if($f->typeCut == 'D')
		{
			$numChicWing = $numChicWing - $stockQty;
			$numChicBreast = $numChicBreast - $stockQty;
			$numChicDrum = $numChicDrum - $stockQty;
			$numChicThigh = $numChicThigh - $stockQty;
			$numChicFull = $numChicFull - $stockQty;

			if($numChicWing < 0)
			{
				$extraWing = (-1 * $numChicWing);
				$numChicWing = 0;
			}

			if($numChicBreast < 0)
			{
				$extraBreast = (-1 * $numChicBreast);
				$numChicBreast = 0;
			}

			if($numChicDrum < 0)
			{
				$extraDrum = (-1 * $numChicDrum);
				$numChicDrum = 0;
			}

			if($numChicThigh < 0)
			{
				$extraThigh = (-1 * $numChicThigh);
				$numChicThigh = 0;
			}

			if($numChicFull < 0)
			{
				$extraFull = (-1 * $numChicFull);
				$numChicFull = 0;
			}

			$outputD = $outputD + $stockQty;
			$totalProfitD = $outputD * saleD;
			$stockQty = 0;
		}
	}
}









$totalProfitAll = $totalProfitA + $totalProfitB + $totalProfitC + $totalProfitD;

$demandLeftWholeChic = $QtyWholeChic;
$costDemandWholeChic = $demandLeftWholeChic * ($wholeChicWeightQty * $wholeChicPriceKg);

$costExtraWholeChic = $extraWholeChic * ($wholeChicWeightQty * $wholeChicPriceKg);

$totalLossWholeChic = $costDemandWholeChic + $costExtraWholeChic;






$demandLeftWing = $numChicWing * 2;
$costDemandWing = $demandLeftWing * ($wingWeightQty * $wingPriceKg);

$extraWing = $extraWing * 2;
$extraCostWing = $extraWing * ($wingWeightQty * $wingPriceKg);

$totalLossWing = $costDemandWing + $extraCostWing;







$demandLeftBreast = $numChicBreast * 2;
$costDemandBreast = $demandLeftBreast * ($breastWeightQty * $breastPriceKg);

$extraBreast = $extraBreast * 2;
$extraCostBreast = $extraBreast * ($breastWeightQty * $breastPriceKg);

$totalLossBreast = $costDemandBreast + $extraCostBreast;






$demandLeftDrum = $numChicDrum * 2;
$costDemandDrum = $demandLeftDrum * ($drumWeightQty * $drumPriceKg);


$extraDrum = $extraDrum * 2;
$extraCostDrum = $extraDrum * ($drumWeightQty * $drumPriceKg);

$totalLossDrum = $costDemandDrum + $extraCostDrum;





$demandLeftThigh = $numChicThigh * 2;
$costDemandThigh = $demandLeftThigh * ($thighWeightQty * $thighPriceKg);


$extraThigh = $extraThigh * 2;
$extraCostThigh = $extraThigh * ($thighWeightQty * $thighPriceKg);

$totalLossThigh = $costDemandThigh + $extraCostThigh;





$demandLeftFull = $numChicFull * 2;
$costDemandFull = $demandLeftFull * ($fullWeightQty * $fullPriceKg);


$extraFull = $extraFull * 2;
$extraCostFull = $extraFull * ($fullWeightQty * $fullPriceKg);

$totalLossFull = $costDemandFull + $extraCostFull;




$totalLoss = $totalLossWholeChic + $totalLossWing + $totalLossBreast + $totalLossDrum + $totalLossThigh + $totalLossFull;

$netProfit = $totalProfitAll - $totalLoss;



@endphp



<h1 class="display-4" style="text-align: center;">PPNJ</h1>
<h1 class="display-5" style="text-align: center;">PROFIL PRODUK AYAM CAMPURAN</h1>
<h3>Ketersediaan Ayam : {{$oriStockQty}} Unit</h3>
<table class="table table-striped" style="border: 2px solid black">
	<thead>
		<tr style="border: 2px solid black">
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Kaedah Potongan</td>
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Bahagian</td>
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Pengeluaran Dalam Unit</td>
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Anggaran Keuntungan/Unit</td>
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Anggaran Keuntungan</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="text-align: center; border-right: solid 1px; border-left: solid 1px;">A</td>
			<td style="text-align: center; border-right: solid 1px; border-left: solid 1px;">1 Ayam Bulat</td>
			<td style="text-align: center; border-right: solid 1px; border-left: solid 1px;">{{ number_format($outputA, 2) }}</td>
			<td style="text-align: center; border-right: solid 1px; border-left: solid 1px;">RM {{ number_format($saleA, 2) }}</td>
			<td style="text-align: center; border-right: solid 1px; border-left: solid 1px;">RM {{ number_format($totalProfitA, 2) }}</td>
		</tr>
		<tr>
			<td style="text-align: center; border-right: solid 1px; border-left: solid 1px;">B</td>
			<td style="text-align: center; border-right: solid 1px; border-left: solid 1px;">2 Kepak + 2 Dada + 2 Drumstik + 2 Paha</td>
			<td style="text-align: center; border-right: solid 1px; border-left: solid 1px;">{{ number_format($outputB, 2) }}</td>
			<td style="text-align: center; border-right: solid 1px; border-left: solid 1px;">RM {{ number_format($saleB, 2) }} </td>
			<td style="text-align: center; border-right: solid 1px; border-left: solid 1px;">RM {{ number_format($totalProfitB, 2) }}</td>
		</tr>
		<tr>
			<td style="text-align: center; border-right: solid 1px; border-left: solid 1px;">C</td>
			<td style="text-align: center; border-right: solid 1px; border-left: solid 1px;">2 Kepak + 2 Dada + 2 Paha Penuh</td>
			<td style="text-align: center; border-right: solid 1px; border-left: solid 1px;">{{ number_format($outputC, 2) }}</td>
			<td style="text-align: center; border-right: solid 1px; border-left: solid 1px;">RM {{ number_format($saleC, 2) }} </td>
			<td style="text-align: center; border-right: solid 1px; border-left: solid 1px;">RM {{ number_format($totalProfitC, 2) }}</td>
		</tr>
		<tr>
			<td style="text-align: center; border-right: solid 1px; border-left: solid 1px;">D</td>
			<td style="text-align: center; border-right: solid 1px; border-left: solid 1px;">2 Kepak + 2 Dada + 1 Drumstik + 1 Peha + 1 Peha Penuh</td>
			<td style="text-align: center; border-right: solid 1px; border-left: solid 1px;">{{ number_format($outputD, 2) }}</td>
			<td style="text-align: center; border-right: solid 1px; border-left: solid 1px;">RM {{ number_format($saleD, 2) }} </td>
			<td style="text-align: center; border-right: solid 1px; border-left: solid 1px;">RM {{ number_format($totalProfitD, 2) }}</td>
		</tr>
		<tr style="border: 2px solid black">
			<td colspan="2" style="font-weight: bold;text-align: center; border-right: solid 1px; border-left: solid 1px;">Jumlah</td>
			<td style="text-align: center; font-weight: bold; border-right: solid 1px; border-left: solid 1px;">{{number_format($outputA + $outputB + $outputC + $outputD, 2)}}</td>
			<td style="text-align: center; font-weight: bold; border-right: solid 1px; border-left: solid 1px;">RM {{number_format($saleA + $saleB + $saleC + $saleD, 2)}}</td>
			<td style="text-align: center; font-weight: bold; border-right: solid 1px; border-left: solid 1px;">RM {{number_format($totalProfitAll, 2)}}</td>
			
		</tr>
	</tbody>
</table>

@php
echo("<br>");
echo("<br>");
echo("<br>");
@endphp

<table class="table table-striped" style="border: 2px solid black">
	<thead>
		<tr style="border: 2px solid black">
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Produk</td>
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Ayam Bulat</td>
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Dada Ayam</td>
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Kepak Ayam</td>
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Drumstik Ayam</td>
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Peha Ayam</td>
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Peha Penuh Ayam</td>
		</tr>
	</thead>
	<tbody>
		<tr style="border: 2px solid black">
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Permintaan</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$oriWholeChic}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$oriBreast}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$oriWing}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$oriDrum}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$oriThigh}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$oriFull}}</td>
		</tr>
		
		
		<tr style="border: 2px solid black">
			<td colspan="7"></td>
		</tr>
		
		
		<tr style="border: 2px solid black">
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Jumlah Pengeluaran</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$oriWholeChic - $QtyWholeChic}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$oriBreast - ($numChicBreast * 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$oriWing - ($numChicWing * 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$oriDrum - ($numChicDrum * 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$oriThigh - ($numChicThigh * 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$oriFull - ($numChicFull * 2)}}</td>
		</tr>
		
		
		<tr style="border: 2px solid black">
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Jumlah Dijual</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$oriWholeChic - $QtyWholeChic}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$oriBreast - ($numChicBreast * 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$oriWing - ($numChicWing * 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$oriDrum - ($numChicDrum * 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$oriThigh - ($numChicThigh * 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$oriFull - ($numChicFull * 2)}}</td>
		</tr>
		
		
		<tr style="border: 2px solid black">
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Jumlah Keuntungan</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">RM {{number_format(($oriWholeChic - $QtyWholeChic) * ($wholeChicWeightQty * $wholeChicPriceKg), 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">RM {{number_format(($oriBreast - ($numChicBreast * 2)) * ($breastWeightQty * $breastPriceKg), 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">RM {{number_format(($oriWing - ($numChicWing * 2)) * ($wingWeightQty * $wingPriceKg), 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">RM {{number_format(($oriDrum - ($numChicDrum * 2)) * ($drumWeightQty * $drumPriceKg), 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">RM {{number_format(($oriThigh - ($numChicThigh * 2)) * ($thighWeightQty * $thighPriceKg), 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">RM {{number_format(($oriFull - ($numChicFull * 2)) * ($fullWeightQty * $fullPriceKg), 2)}}</td>

			@php

			$totalWhole = ($oriWholeChic - $QtyWholeChic) * ($wholeChicWeightQty * $wholeChicPriceKg);
			$totalBreast = ($oriBreast - ($numChicBreast * 2)) * ($breastWeightQty * $breastPriceKg);
			$totalWing = ($oriWing - ($numChicWing * 2)) * ($wingWeightQty * $wingPriceKg);
			$totalDrum = ($oriDrum - ($numChicDrum * 2)) * ($drumWeightQty * $drumPriceKg);
			$totalThigh = ($oriThigh - ($numChicThigh * 2)) * ($thighWeightQty * $thighPriceKg);
			$totalFull = ($oriFull - ($numChicFull * 2)) * ($fullWeightQty * $fullPriceKg);

			$totalAll = $totalWhole + $totalBreast + $totalWing + $totalDrum + $totalThigh + $totalFull;

			@endphp
			

		</tr>

		<tr style="border: 2px solid black">
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Jumlah Keseluruhan</td>
			<td colspan="6" style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">RM {{number_format($totalAll, 2)}}</td>
		</tr>
		
		<tr style="border: 2px solid black">
			<td colspan="7"></td>
		</tr>

		<tr style="border: 2px solid black">
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Kekurangan</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$demandLeftWholeChic}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$demandLeftBreast}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$demandLeftWing}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$demandLeftDrum}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$demandLeftThigh}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$demandLeftFull}}</td>
		</tr>

		<tr style="border: 2px solid black">
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Penalti Kekurangan</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">RM {{number_format($costDemandWholeChic, 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">RM {{number_format($costDemandBreast, 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">RM {{number_format($costDemandWing, 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">RM {{number_format($costDemandDrum, 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">RM {{number_format($costDemandThigh, 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">RM {{number_format($costDemandFull, 2)}}</td>
		</tr>

		<tr style="border: 2px solid black">
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Kelebihan</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$extraWholeChic}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$extraBreast}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$extraWing}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$extraDrum}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$extraThigh}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">{{$extraFull}}</td>
		</tr>

		<tr style="border: 2px solid black">
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Penalti Kelebihan</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">RM {{number_format($costExtraWholeChic, 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">RM {{number_format($extraCostBreast, 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">RM {{number_format($extraCostWing, 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">RM {{number_format($extraCostDrum, 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">RM {{number_format($extraCostThigh, 2)}}</td>
			<td style="text-align: center;  border-right: solid 1px; border-left: solid 1px;">RM {{number_format($extraCostFull, 2)}}</td>
		</tr>

		<tr style="border: 2px solid black">
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Jumlah Penalti</td>
			<td colspan="6" style="text-align: center; font-weight: bold;  border-right: solid 1px; border-left: solid 1px;">RM {{number_format($totalLoss, 2)}}</td>
		</tr>


		<tr style="border: 2px solid black">
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Jumlah Keuntungan</td>
			<td colspan="6" style="text-align: center; font-weight: bold;  border-right: solid 1px; border-left: solid 1px;">RM {{number_format($totalAll - $totalLoss, 2)}}</td>
		</tr>
	</tbody>
</table>

@php
echo("<br>");
echo("<br>");
@endphp


@php
$totalCost = 0;
@endphp

<table class="table table-striped" style="border: 2px solid black">
	<thead>
		<tr style="border: 2px solid black">
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Nama Kos</td>
			<td style="text-align: center;  font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Kos</td>
		</tr>
	</thead>


	@foreach($costs as $cost)
	@if($cost->stock_id ==1)
	<tbody>
		<tr style="border: 2px solid black">
			<td style="text-align: center; border-right: solid 1px; border-left: solid 1px;">{{$cost->cost_name}}</td>
			<td style="text-align: center;font-weight: bold; border-right: solid 1px; border-left: solid 1px;">RM {{number_format($cost->cost, 2)}}</td>
		</tr>
		@php
		$totalCost = $totalCost + $cost->cost;
		@endphp

		@endif

		@endforeach
		<tr style="border: 2px solid black">
			<td style="text-align: center;font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Total Cost</td>
			<td style="text-align: center;font-weight: bold; border-right: solid 1px; border-left: solid 1px;">RM {{number_format(($totalCost), 2)}}</td>
		</tr>
		<tr style="border: 2px solid black">
			<td style="text-align: center;font-weight: bold; border-right: solid 1px; border-left: solid 1px;">Keuntungan Bersih (Net Profit)</td>
			<td style="text-align: center;font-weight: bold; border-right: solid 1px; border-left: solid 1px;">RM {{number_format(($totalAll - $totalLoss)-$totalCost, 2)}}</td>
		</tr>

	</tbody>


</table>





@endsection