<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Resolve dark mode state and toggle URL from the current request.
     */
    private function resolveTheme(Request $request): array
    {
        $mode = $request->query('mode');
        $isDark = in_array($mode, ['dark', 'light'], true) ? $mode === 'dark' : false;

        $toggleMode = $isDark ? 'light' : 'dark';
        $toggleUrl = $request->fullUrlWithQuery(['mode' => $toggleMode]);

        return compact('isDark', 'toggleUrl');
    }

    /**
     * Preserve mode parameter when building navigation links.
     */
    private function navLinks(Request $request): array
    {
        $mode = $request->query('mode');
        $query = in_array($mode, ['dark', 'light'], true) ? ['mode' => $mode] : [];

        return [
            'beranda' => route('beranda', $query),
            'profil' => route('profil', $query),
            'ideAgent' => route('ide-agent', $query),
        ];
    }

    /**
     * Home page with hero, value propositions, and optional welcome banner.
     */
    public function beranda(Request $request)
    {
        $theme = $this->resolveTheme($request);
        $nav = $this->navLinks($request);

        // Sanitize welcome user parameter
        $rawUser = $request->query('user', '');
        $user = $this->sanitizeUser($rawUser);

        $values = [
            [
                'icon' => 'user-check',
                'title' => 'Personal Relevance',
                'desc' => 'Matches jobs to your unique profile — education, skills, projects, and career goals.',
            ],
            [
                'icon' => 'trending-up',
                'title' => 'Intelligent Prioritization',
                'desc' => 'Ranks opportunities by fit so you focus energy on the positions that matter most.',
            ],
            [
                'icon' => 'file-text',
                'title' => 'Tailored Applications',
                'desc' => 'Generates customized CVs and materials highlighting your most relevant experience.',
            ],
        ];

        $steps = [
            ['num' => 1, 'title' => 'Share Your Profile', 'desc' => 'Tell the agent about your skills, experience, and career aspirations.'],
            ['num' => 2, 'title' => 'Discover Opportunities', 'desc' => 'The agent scans and analyzes thousands of job postings for you.'],
            ['num' => 3, 'title' => 'Get Personalized Results', 'desc' => 'Receive ranked opportunities with tailored application materials.'],
        ];

        return view('beranda', compact('theme', 'nav', 'user', 'values', 'steps'))
            ->with('aktif', 'beranda');
    }

    /**
     * Profile page with personal data, skills, and experience.
     */
    public function profil(Request $request)
    {
        $theme = $this->resolveTheme($request);
        $nav = $this->navLinks($request);

        // EDIT ME: Update personal information below
        $profil = [
            'nama' => 'Muhammad Sholihuddin Rizky',
            'nrp' => '5025241171',
            'program' => 'Informatics Engineering',
            'universitas' => 'Institut Teknologi Sepuluh Nopember',
            'lokasi' => 'Surabaya, Indonesia',
            'bio' => 'A highly motivated Informatics Engineering student at Institut Teknologi Sepuluh Nopember with hands-on experience in Full-Stack Software Engineering, Event Operations, and Administration. Passionate about building scalable backend architectures and driving impactful tech events.',
            'foto' => 'images/rizky.jpg',
        ];

        $skills = ['C', 'C++', 'HTML', 'CSS', 'JavaScript', 'Bash', 'Laravel', 'Linux'];

        $experience = [
            [
                'role' => 'Software Engineer Intern',
                'company' => 'PT Nexgen Ega Teknologi',
                'period' => 'Jul 2026 - Aug 2026',
                'desc' => "Participated in an independent engineering internship program focused on developing production-grade enterprise software architecture.\n\nKey Responsibilities & Deliverables:\n• Architected and developed the End-to-End MAXIMA B2B ERP system (Frontend & Backend).\n• Built high-performance, deterministic RESTful APIs using Go (Golang), Gin framework, and GORM ORM.\n• Designed relational database schemas and automated data migrations utilizing PostgreSQL.\n• Implemented secure authentication and authorization pipelines with Bcrypt password hashing.\n• Developed responsive and reactive user interfaces using modern Frontend architecture.",
            ],
            [
                'role' => 'Operational Division Staff',
                'company' => 'Schematics ITS',
                'period' => 'Mar 2025 - Feb 2026',
                'desc' => "Served as core Operational Division staff for Schematics ITS, the largest annual national-scale technology event hosted by Informatics Engineering ITS, supporting 1,000+ participants nationwide.\n\nKey Contributions & Responsibilities:\n• Orchestrated end-to-end venue logistics, on-ground operations, and infrastructure readiness for over 1,000 national participants across major competitions (NLC, NPC, and BST).\n• Managed resource allocation, procurement distribution, and physical-technical setups to achieve seamless event execution with zero operational downtime.\n• Directed high-volume crowd flow, seating allocations, and contingency protocols during the offline final rounds and main exhibition stages.\n• Collaborated cross-functionally with technical committees and external vendors to maintain timeline precision across all event milestones.",
            ],
            [
                'role' => 'Delegate',
                'company' => 'Model United Nations Club, ITS',
                'period' => 'Feb 2025 - Jan 2026',
                'desc' => 'Coordinated the preparation of essential documents and permits required for international delegates. Developed structured training schedules to ensure delegates are well-prepared for national and international MUN conferences. Supported all administrative and logistic preparations for delegate representation of ITS in MUN events.',
            ],
            [
                'role' => 'Administrative Intern',
                'company' => 'BPBD Jawa Timur',
                'period' => 'Nov 2023 - Dec 2023',
                'desc' => 'Managed around 20+ administrative documents, ensuring proper archiving and digitization. Assisted in data entry and document processing, improving organizational efficiency. Supported event coordination by handling documentation and technical operations.',
            ],
        ];

        $interests = [
            'Software Engineering & Backend Development',
            'Artificial Intelligence & Machine Learning',
            'Project Management & Event Organizing',
        ];

        return view('profil', compact('theme', 'nav', 'profil', 'skills', 'experience', 'interests'))
            ->with('aktif', 'profil');
    }

    /**
     * Research ideas page with pipeline visualization, goals, and idea form.
     */
    public function ideAgent(Request $request)
    {
        $theme = $this->resolveTheme($request);
        $nav = $this->navLinks($request);

        $pipeline = [
            [
                'title' => 'Profile Intake',
                'desc' => 'The agent collects the user\'s education, skills, projects, experience, and career preferences to build a comprehensive profile.',
                'input' => 'User-provided data',
                'output' => 'Structured user profile',
            ],
            [
                'title' => 'Job Discovery',
                'desc' => 'Scans multiple job boards and company career pages to aggregate current openings relevant to the user\'s field.',
                'input' => 'Structured profile + job sources',
                'output' => 'Raw job listing pool',
            ],
            [
                'title' => 'Relevance Matching & Scoring',
                'desc' => 'Compares each job posting against the user\'s profile using semantic and keyword analysis to assign a relevance score.',
                'input' => 'User profile + job listings',
                'output' => 'Scored job list',
            ],
            [
                'title' => 'Prioritization',
                'desc' => 'Ranks scored jobs by relevance, career trajectory alignment, and user preferences to surface the best opportunities first.',
                'input' => 'Scored job list + preferences',
                'output' => 'Prioritized job rankings',
            ],
            [
                'title' => 'Competency & Experience Mapping',
                'desc' => 'Identifies which of the user\'s skills, projects, and experiences are most relevant to each selected job opening.',
                'input' => 'Selected job + user profile',
                'output' => 'Competency-to-job mapping',
            ],
            [
                'title' => 'Application Tailoring',
                'desc' => 'Generates customized CV content, cover letter points, and application materials highlighting the user\'s best-fit qualifications.',
                'input' => 'Competency mapping + job requirements',
                'output' => 'Tailored application materials',
            ],
            [
                'title' => 'Application Kit & Recommendations',
                'desc' => 'Delivers a complete application package with personalized recommendations on application strategy and preparation.',
                'input' => 'Tailored materials + job context',
                'output' => 'Ready-to-submit application kit',
            ],
        ];

        $goals = [
            [
                'icon' => 'search',
                'title' => 'Reduce Manual Screening',
                'desc' => 'Cut the hours spent manually searching and screening job postings by automating discovery and analysis.',
            ],
            [
                'icon' => 'target',
                'title' => 'Surface Best-Fit Opportunities',
                'desc' => 'Identify the jobs most relevant to the user\'s profile and career goals with intelligent matching.',
            ],
            [
                'icon' => 'edit',
                'title' => 'Tailor Application Materials',
                'desc' => 'Generate customized CVs and application documents per job, highlighting the most relevant qualifications.',
            ],
            [
                'icon' => 'star',
                'title' => 'More Personal Than Keywords',
                'desc' => 'Go beyond simple keyword matching to deliver genuinely personalized career recommendations.',
            ],
        ];

        $categories = ['AI & Machine Learning', 'Natural Language Processing', 'Career Technology', 'User Experience', 'Data Analytics', 'Other'];

        return view('ide-agent', compact('theme', 'nav', 'pipeline', 'goals', 'categories'))
            ->with('aktif', 'ide-agent');
    }

    /**
     * Handle idea form submission with validation.
     */
    public function submitIdea(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'idea_title' => 'required|string|max:200',
            'idea_description' => 'required|string|max:2000',
            'category' => 'nullable|string|max:100',
        ], [
            'name.required' => 'Please provide your full name.',
            'name.max' => 'Name must be under 100 characters.',
            'email.required' => 'A valid email address is needed so we can follow up.',
            'email.email' => 'Please enter a properly formatted email address.',
            'idea_title.required' => 'Every great idea needs a title — please add one.',
            'idea_title.max' => 'Title must be under 200 characters.',
            'idea_description.required' => 'Please describe your idea in detail.',
            'idea_description.max' => 'Description must be under 2,000 characters.',
        ]);

        // No persistence — redirect back with success flash
        return redirect()
            ->to(url()->previous() . '#idea-form')
            ->withInput()
            ->with('success', 'Your idea has been submitted successfully! We appreciate your contribution to the research.');
    }

    /**
     * Sanitize the welcome user parameter.
     */
    private function sanitizeUser(string $raw): ?string
    {
        $trimmed = trim($raw);
        if ($trimmed === '') {
            return null;
        }

        // Allow only safe characters: letters, digits, spaces, dots, hyphens
        if (!preg_match('/^[a-zA-Z0-9\s.\-]+$/', $trimmed)) {
            return null;
        }

        // Cap at 30 characters
        return mb_substr($trimmed, 0, 30);
    }
}
