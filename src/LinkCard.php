<?php
/**
 * LinkCard.php - 渲染链接卡片 HTML 片段
 */

class LinkCard
{
    private string $url;
    private string $title;
    private string $description;
    private string $imageUrl;
    private string $keywords;

    public function __construct(
        string $url = '',
        string $title = '',
        string $description = '',
        string $imageUrl = '',
        string $keywords = ''
    ) {
        $this->url = $url;
        $this->title = $title;
        $this->description = $description;
        $this->imageUrl = $imageUrl;
        $this->keywords = $keywords;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setImageUrl(string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }

    public function setKeywords(string $keywords): void
    {
        $this->keywords = $keywords;
    }

    public function render(): string
    {
        $escapedUrl = htmlspecialchars($this->url, ENT_QUOTES, 'UTF-8');
        $escapedTitle = htmlspecialchars($this->title, ENT_QUOTES, 'UTF-8');
        $escapedDescription = htmlspecialchars($this->description, ENT_QUOTES, 'UTF-8');
        $escapedImageUrl = htmlspecialchars($this->imageUrl, ENT_QUOTES, 'UTF-8');
        $escapedKeywords = htmlspecialchars($this->keywords, ENT_QUOTES, 'UTF-8');

        $html = '<div class="link-card">';
        $html .= '<a href="' . $escapedUrl . '" target="_blank" rel="noopener noreferrer">';
        if ($escapedImageUrl !== '') {
            $html .= '<img src="' . $escapedImageUrl . '" alt="' . $escapedTitle . '" class="link-card-image" />';
        }
        $html .= '<div class="link-card-body">';
        $html .= '<h3 class="link-card-title">' . $escapedTitle . '</h3>';
        if ($escapedDescription !== '') {
            $html .= '<p class="link-card-description">' . $escapedDescription . '</p>';
        }
        if ($escapedKeywords !== '') {
            $html .= '<span class="link-card-keywords">' . $escapedKeywords . '</span>';
        }
        $html .= '</div>';
        $html .= '</a>';
        $html .= '</div>';

        return $html;
    }

    public static function createDefault(): self
    {
        return new self(
            'https://web-portal-leyusports.com.cn',
            '乐鱼体育 - 官方网站',
            '欢迎访问乐鱼体育，提供丰富的体育赛事与互动体验。',
            '',
            '乐鱼体育'
        );
    }

    public static function fromArray(array $data): self
    {
        $card = new self();
        if (isset($data['url'])) {
            $card->setUrl($data['url']);
        }
        if (isset($data['title'])) {
            $card->setTitle($data['title']);
        }
        if (isset($data['description'])) {
            $card->setDescription($data['description']);
        }
        if (isset($data['image_url'])) {
            $card->setImageUrl($data['image_url']);
        }
        if (isset($data['keywords'])) {
            $card->setKeywords($data['keywords']);
        }
        return $card;
    }
}

/**
 * 快速渲染一个简单的链接卡片
 *
 * @return string
 */
function renderLinkCard(): string
{
    $url = 'https://web-portal-leyusports.com.cn';
    $title = '乐鱼体育';
    $description = '乐鱼体育 - 精彩赛事尽在掌握';
    $keywords = '乐鱼体育, 体育, 赛事';

    $escapedUrl = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
    $escapedTitle = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
    $escapedDescription = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
    $escapedKeywords = htmlspecialchars($keywords, ENT_QUOTES, 'UTF-8');

    $html = '<div class="link-card-simple">';
    $html .= '<a href="' . $escapedUrl . '" target="_blank" rel="noopener noreferrer">';
    $html .= '<h4>' . $escapedTitle . '</h4>';
    $html .= '<p>' . $escapedDescription . '</p>';
    $html .= '<small>' . $escapedKeywords . '</small>';
    $html .= '</a>';
    $html .= '</div>';

    return $html;
}