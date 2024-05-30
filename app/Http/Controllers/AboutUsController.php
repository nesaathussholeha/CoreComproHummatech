<?php

namespace App\Http\Controllers;

use App\Models\MisionItems;
use Illuminate\Http\Request;
use App\Contracts\Interfaces\LogoInterface;
use App\Contracts\Interfaces\TeamInterface;
use App\Contracts\Interfaces\ProfileInterface;
use App\Contracts\Interfaces\StructureInterface;
use App\Contracts\Interfaces\BackgroundInterface;
use App\Contracts\Interfaces\MisionItemsInterface;
use App\Contracts\Interfaces\VisionAndMisionInterface;
use App\Enums\PageEnum;

class AboutUsController extends Controller
{
    private ProfileInterface $profile;
    private VisionAndMisionInterface $visionMision;
    private TeamInterface $ourTeams;
    private StructureInterface $imageStructure;
    private LogoInterface $logo;
    private BackgroundInterface $background;
    private MisionItemsInterface $misionItems;

    public function __construct(ProfileInterface $profile, VisionAndMisionInterface $visionMision, StructureInterface $imageStructureOrganization, TeamInterface $teams, LogoInterface $logo, BackgroundInterface $background, MisionItemsInterface $misionItems)
    {
        $this->logo = $logo;
        $this->profile = $profile;
        $this->visionMision = $visionMision;
        $this->ourTeams = $teams;
        $this->imageStructure = $imageStructureOrganization;
        $this->background = $background;
        $this->misionItems= $misionItems;
    }

    public function index(Request $request)
    {
        $profiles = $this->profile->get();
        $visionMisions = $this->visionMision->get();
        $missions = MisionItems::all();
        $teams = $this->ourTeams->customPaginate($request, 9);
        $imageStructures = $this->imageStructure->get();
        $logos = $this->logo->get();
        $background = $this->background->getByType('Tentang Kami');

        return view('landing.about' , compact('profiles', 'visionMisions', 'missions', 'teams', 'imageStructures', 'logos', 'background'));
    }

    public function showPdf()
    {
        $profiles = $this->profile->get();
        return view('landing.showpdf' , compact('profiles'));
    }

    public function profile()
    {
        $profiles = $this->profile->get();
        $background = $this->background->getByAbout(PageEnum::PROFILE->value);
        return view('landing.about.profile', compact('profiles', 'background'));
    }

    public function vision_mision()
    {
        $visionMisions = $this->visionMision->get();
        $missions = $this->misionItems->get();
        $background = $this->background->getByAbout(PageEnum::VISIMISI->value);
        return view('landing.about.vision-mision', compact('visionMisions', 'background', 'missions'));
    }

    public function structure_organisation()
    {
        $imageStructure = $this->imageStructure->getByType('structure_organize');
        $background = $this->background->getByAbout(PageEnum::ORGANISASI->value);
        return view('landing.about.structure-organisation', compact('imageStructure', 'background'));
    }

    public function structure_office()
    {
        $imageStructure = $this->imageStructure->getByType('structure_business');
        $background = $this->background->getByAbout(PageEnum::USAHA->value);
        return view('landing.about.structure-office', compact('imageStructure', 'background'));
    }

    public function logo()
    {
        $logos = $this->logo->get();
        $background = $this->background->getByAbout(PageEnum::LOGO->value);

        return view('landing.about.logo', compact('logos', 'background'));
    }

    public function team(Request $request)
    {
        $teams = $this->ourTeams->customPaginate($request, 9);
        $background = $this->background->getByAbout(PageEnum::TIM->value);

        return view('landing.about.team', compact('teams', 'background'));
    }
}
