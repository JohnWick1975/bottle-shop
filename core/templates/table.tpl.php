<table <?php print html_attr($data['attr'] ?? []) ?>>
    <tr>
        <?php foreach ($data['headings'] as $heading): ?>
            <th><?php print $heading ?></th>
        <?php endforeach; ?>
    </tr>
    <?php foreach ($data['rows'] ?? [] as $row): ?>
        <tr>
            <?php foreach ($row as $col): ?>
                <td><?php print $col ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>