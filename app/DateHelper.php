<?php

function formatDate($dateString)
    {
        $date = \Carbon\Carbon::createFromFormat('Y-m-d', $dateString);
        return $date->format('d-m-Y');
    }

