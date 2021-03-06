<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Productpricehistories;

/**
 * SearchProductpricehistories represents the model behind the search form about `common\models\Productpricehistories`.
 */
class SearchProductpricehistories extends Productpricehistories
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ProductPriceHistoryId', 'ProductId', 'ProductOptionCombinationId', 'ProductOptionPriceId', 'created_by', 'LastUpdatedBy', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['OldPrice', 'NewPrice'], 'number'],
            [['Comment'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Productpricehistories::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ProductPriceHistoryId' => $this->ProductPriceHistoryId,
            'ProductId' => $this->ProductId,
            'ProductOptionCombinationId' => $this->ProductOptionCombinationId,
            'ProductOptionPriceId' => $this->ProductOptionPriceId,
            'OldPrice' => $this->OldPrice,
            'NewPrice' => $this->NewPrice,
            'created_by' => $this->created_by,
            'LastUpdatedBy' => $this->LastUpdatedBy,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'Comment', $this->Comment]);

        return $dataProvider;
    }
}
