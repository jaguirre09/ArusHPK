<?php


class SelectSurvey
{
    private int $id;

    /**
     * selectSurvey constructor.
     * @param int $id Id of survey to select
     */
    public function __construct(int $id)
    {
        $this->id = $id;
        $this->setSurvey();
    }

    private function setSurvey()
    {
        $myFile = fopen("survey.arus", "w") or die("No se puede abrir el archivo survey.arus");
        $txt = "$this->id";
        fwrite($myFile, $txt);
        fclose($myFile);
    }
}